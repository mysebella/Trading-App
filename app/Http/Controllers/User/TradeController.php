<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Code;
use App\Http\Controllers\Tools\Current;
use App\Http\Controllers\Tools\Notification;
use App\Models\Profile;
use App\Models\Trade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TradeController extends Controller
{
    public function index()
    {
        return view('user.trade.trading', [
            'page' => 'trade',
            'tradings' => Trade::where('user_id', Cookie::get('id'))->get()
        ]);
    }

    public function store(Request $request)
    {
        $id = Cookie::get('id');
        $user = User::with('profile')->find($id);
        $balance = $user->profile[0]->balance;

        // check balance user apakah cukup atau tidak
        if ($balance == 0 or $balance < $request->amount) {
            // jika tidak maka kirim pesan error
            return back()->with('error', 'your balance is not enough');
        }

        // update balance user
        $profile = Profile::find($user->profile[0]->id);
        $profile->balance = $balance - $request->amount;
        $profile->save();

        // jika sudah berhasil
        if ($profile) {
            // simpan informasi trading
            $trade = Trade::create([
                'user_id' => $id,
                'code' => Code::generate(),
                'type' => $request->type,
                'open' => Current::price($request->market),
                'package' => $this->convertSecondtoString($request->timeFrame),
                'market' => $request->market,
                'amount' => $request->amount,
                'expiresAt' => now()->addSeconds(intval($request->timeFrame))
            ]);

            // simpan log
            Notification::create("Add Stake $trade->code", "you $request->type at $trade->created_at");

            return back()->with('success', $request->type . ' Success');
        } else {
            return back()->with('error', $request->type . '  Failed');
        }
    }

    public function history()
    {
        return view('user.trade.history', [
            'page' => 'trade',
            'tradings' => Trade::where('user_id', Cookie::get('id'))->get()
        ]);
    }

    public function profits()
    {
        $totalProfit = Trade::where('user_id', Cookie::get('id'))->sum('profit');

        return view('user.trade.profits', [
            'page' => 'trade',
            'totalProfit' => $totalProfit,
            'tradings' => Trade::where('user_id', Cookie::get('id'))->where('status', 'win')->get()
        ]);
    }

    public function convertSecondtoString($second)
    {
        $timeFrame = $second / 60;
        return ($timeFrame < 1) ? "30 Second" : $timeFrame . " Minute";
    }
}

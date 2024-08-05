<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Code;
use App\Models\Balance;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WalletController extends Controller
{
    public function balance()
    {
        $balances = Balance::where('user_id', Cookie::get('id'))->get();
        return view('user.wallet.balance', ['page' => 'wallet', 'balances' => $balances]);
    }

    public function addBalance()
    {
        return view('user.wallet.add-balance', ['page' => 'wallet']);
    }

    public function addBalanceStore(Request $request)
    {
        $balance = Balance::create([
            'user_id' => Cookie::get('id'),
            'code' => Code::generate(),
            'amount' => $request->amount,
        ]);

        return redirect()->route('wallet.invoice', ['id' => $balance]);
    }

    public function invoice($id)
    {
        $balance = Balance::find($id);
        $banks = Bank::get();

        return view('user.wallet.invoice', [
            'page' => 'wallet',
            'balance' => $balance,
            'banks' => $banks
        ]);
    }

    public function confirmation($id)
    {
        $balance = Balance::find($id);
        $histories = Balance::where('user_id', Cookie::get('id'))->get();
        $banks = Bank::get();

        return view('user.wallet.confirmation', [
            'page' => 'wallet',
            'balance' => $balance,
            'histories' => $histories,
            'banks' => $banks
        ]);
    }

    public function confirmationPut(Request $request, $id)
    {
        $balance = Balance::where('user_id', Cookie::get('id'))->where('id', $id)->first();

        if (!$balance) {
            return back('')->with('error', 'Payment Failed');
        }

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = "proof-payment-balance-" . time() . '.' . $file->extension();
            $file->storeAs('public/proof-balance/', $filename);

            $balance->note = $request->note;
            $balance->proof = $filename;
            $balance->isPaid = 1;
            $balance->paymentTo = $request->paymentTo;
            $balance->save();
        } else {
            return back('')->with('error', 'please upload proof of payment');
        }
        return redirect(route('wallet.balance'))->with('success', 'Buy Success');
    }

    public function transfer()
    {
        return view('user.wallet.transfer', ['page' => 'wallet']);
    }

    public function withdraw()
    {
        return view('user.wallet.withdraw', ['page' => 'wallet']);
    }
}

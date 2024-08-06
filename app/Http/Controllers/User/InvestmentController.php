<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Code;
use App\Http\Controllers\Tools\Notification;
use App\Models\Bank;
use App\Models\Investment;
use App\Models\Package;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class InvestmentController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $histories = Investment::where('user_id', Cookie::get('id'))->get();

        return view('user.investment.index', [
            'page' => 'investment',
            'packages' => $packages,
            'histories' => $histories
        ]);
    }

    public function paid(Request $request)
    {
        $userId = Cookie::get('id');
        $histories = Investment::with('package')->where('user_id', $userId)->get();
        $user = User::with('profile')->find($userId);

        if ($user->status == 0) {
            return back()->with('error', 'Please activated your account to investment');
        }

        $hasUnpaidPackage = $histories->contains(fn ($history) => !$history->isPaid);


        if ($hasUnpaidPackage) {
            return back()->with('error', 'You Have Package to Pay');
        }

        $hasUnpaidActive = $histories->contains(fn ($history) => $history->status == 'active');

        if ($hasUnpaidActive) {
            return back()->with('error', 'You Have Package Active');
        }

        $package = Package::find($request->query('package'));
        $package->amount = $request->query('amount');

        return view('user.investment.paid', [
            'page' => 'investment',
            'package' => $package,
            'histories' => $histories
        ]);
    }

    public function paidPost(Request $request)
    {
        $investment = Investment::create([
            'code' => Code::generate(),
            'user_id' => Cookie::get('id'),
            'package_id' => $request->input('package_id'),
            'amount' => $request->input('amount'),
        ]);

        $package = Package::select('name')->find($investment->package_id);

        Notification::create('investment', "Add investment package $package", "You invest in package $package");

        return redirect()->route('investment.invoice', ['code' => $investment->code]);
    }

    public function invoice($code)
    {
        $userId = Cookie::get('id');
        $investment = Investment::where('user_id', $userId)->where('code', $code)->firstOrFail();
        $banks = Bank::all();

        return view('user.investment.invoice', [
            'page' => 'investment',
            'banks' => $banks,
            'investment' => $investment
        ]);
    }

    public function confirmation($id)
    {
        $userId = Cookie::get('id');
        $investment = Investment::where('user_id', $userId)->where('id', $id)->firstOrFail();
        $histories = Investment::with('package')->where('user_id', $userId)->get();
        $banks = Bank::all();

        return view('user.investment.confirmation', [
            'page' => 'investment',
            'banks' => $banks,
            'histories' => $histories,
            'investment' => $investment
        ]);
    }

    public function confirmationPut(Request $request, $id)
    {

        $profile = Profile::where('user_id', Cookie::get('id'))->first();
        $investment = Investment::where('id', $id)
            ->where('user_id', Cookie::get('id'))
            ->first();

        if (!$investment) {
            return back('')->with('error', 'Payment Failed');
        }

        // check user mengunakan apa dia bertransaksi
        // jika mengunakan balance maka kurangi balance yang dia miliki
        if ($request->paymentTo == "Balance Wallet") {
            // kurangi saldo sama dengan yang dia beli
            // jika saldo user nol makan kirimkan pesan bahwa saldo 0
            if ($profile->balance == "0.0") {
                return back()->with('error', 'Your Balance Not Enough');
            }
            $balanceAfterBuy = $profile->balance - $investment->amount;
            $profile->balance = $balanceAfterBuy;
            $profile->save();

            // jika sudah di kurangi makan berikan update data kalo pembayaran sudah di laksanakan
            $investment->note = $request->note;
            $investment->isPaid = 1;
            $investment->proof = "balance.jpg";
            $investment->paymentTo = 'Balance Wallet';
            $investment->save();
        } else {
            // jika user tidak memakai balance maka user harus menupload gambar
            if ($request->hasFile('proof')) {
                $file = $request->file('proof');
                $filename = "proof-payment-invest-" . time() . '.' . $file->extension();
                $file->storeAs('public/proof-payment/', $filename);

                // jika berhasil upload maka update data investment
                $investment->note = $request->note;
                $investment->proof = $filename;
                $investment->isPaid = 1;
                $investment->paymentTo = $request->paymentTo;
                $investment->save();
            } else {
                return back('')->with('error', 'please upload proof of payment');
            }
        }

        return redirect(route('investment'))->with('success', 'Package Investment Added');
    }
}

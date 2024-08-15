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
    /**
     * Display the investment overview page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = Cookie::get('id');
        $packages = Package::all();
        $investmentHistories = Investment::where('user_id', $userId)->get();

        return view('user.investment.index', [
            'page' => 'investment.index',
            'packages' => $packages,
            'histories' => $investmentHistories
        ]);
    }

    /**
     * Show the payment page for a package.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function paid(Request $request)
    {
        $userId = Cookie::get('id');
        $investmentHistories = Investment::with('package')->where('user_id', $userId)->get();
        $user = User::with('profile')->find($userId);
        $package = Package::findOrFail($request->query('package'));

        if ($_GET['amount'] <= $package->min) {
            return back()->with('error', 'what you submitted does not meet the minimum purchase');
        }

        if ($_GET['amount'] >= $package->max) {
            return back()->with('error', 'the amount you submitted exceeds the maximum purchase');
        }

        if ($user->status == 'noactived') {
            return back()->with('error', 'Please activate your account to invest.');
        }

        if ($investmentHistories->contains(fn($history) => !$history->isPaid)) {
            return back()->with('error', 'You have a package to pay.');
        }

        if ($investmentHistories->contains(fn($history) => $history->status === 'active')) {
            return back()->with('error', 'You have an active package.');
        }


        $package->amount = $request->query('amount');

        return view('user.investment.paid', [
            'page' => 'investment',
            'package' => $package,
            'histories' => $investmentHistories
        ]);
    }

    /**
     * Handle the payment submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paidPost(Request $request)
    {
        $userId = Cookie::get('id');

        $investment = Investment::create([
            'code' => Code::generate(),
            'user_id' => $userId,
            'package_id' => $request->input('package_id'),
            'amount' => $request->input('amount'),
        ]);

        $packageName = Package::findOrFail($investment->package_id)->name;

        Notification::create("Add investment package $packageName", "You invested in package $packageName");

        return redirect()->route('investment.invoice', ['code' => $investment->code]);
    }

    /**
     * Show the invoice page for a specific investment.
     *
     * @param string $code
     * @return \Illuminate\View\View
     */
    public function invoice(string $code)
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

    /**
     * Show the confirmation page for a specific investment.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function confirmation(int $id)
    {
        $userId = Cookie::get('id');
        $investment = Investment::where('user_id', $userId)->where('id', $id)->firstOrFail();
        $investmentHistories = Investment::with('package')->where('user_id', $userId)->get();
        $banks = Bank::all();

        return view('user.investment.confirmation', [
            'page' => 'investment',
            'banks' => $banks,
            'histories' => $investmentHistories,
            'investment' => $investment
        ]);
    }

    /**
     * Handle the confirmation of payment for an investment.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmationPut(Request $request, int $id)
    {
        $userId = Cookie::get('id');
        $profile = Profile::where('user_id', $userId)->firstOrFail();
        $investment = Investment::with('package')
            ->where('id', $id)
            ->firstOrFail();

        if ($request->paymentTo === "Balance Wallet") {
            if ($profile->balance <= $investment->amount) {
                return back()->with('error', 'Your balance is not enough.');
            }

            $profile->balance -= $investment->amount;
            $profile->save();

            $investment->update([
                'note' => $request->note,
                'isPaid' => true,
                'proof' => "balance.jpg",
                'paymentTo' => 'Balance Wallet'
            ]);
        } else {
            if ($request->hasFile('proof')) {
                $file = $request->file('proof');
                $filename = "proof-payment-invest-" . time() . '.' . $file->extension();
                $file->storeAs('public/proof-payment/', $filename);

                $investment->update([
                    'note' => $request->note,
                    'proof' => $filename,
                    'isPaid' => true,
                    'paymentTo' => $request->paymentTo
                ]);
            } else {
                return back()->with('error', 'Please upload proof of payment.');
            }
        }

        return redirect()->route('investment.index')->with('success', 'Package investment added.');
    }
}

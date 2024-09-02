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
        $userId = Cookie::get('id');
        $packages = Package::all();
        $riwayatInvestasi = Investment::where('user_id', $userId)->get();

        return view('user.investment.index', [
            'page' => 'investment.index',
            'packages' => $packages,
            'histories' => $riwayatInvestasi
        ]);
    }

    public function paid(Request $request)
    {
        $userId = Cookie::get('id');
        $riwayatInvestasi = Investment::with('package')->where('user_id', $userId)->get();
        $user = User::with('profile')->find($userId);
        $package = Package::findOrFail($request->query('package'));

        if ($_GET['amount'] <= $package->min) {
            return back()->with('error', 'Jumlah yang Anda masukkan tidak memenuhi pembelian minimum');
        }

        if ($_GET['amount'] >= $package->max) {
            return back()->with('error', 'Jumlah yang Anda masukkan melebihi pembelian maksimum');
        }

        if ($user->status == 'noactived') {
            return back()->with('error', 'Silakan aktifkan akun Anda untuk berinvestasi.');
        }

        if ($riwayatInvestasi->contains(fn($history) => !$history->isPaid)) {
            return back()->with('error', 'Anda memiliki paket yang harus dibayar.');
        }

        if ($riwayatInvestasi->contains(fn($history) => $history->status === 'active')) {
            return back()->with('error', 'Anda memiliki paket yang aktif.');
        }

        $package->amount = $request->query('amount');

        return view('user.investment.paid', [
            'page' => 'investment',
            'package' => $package,
            'histories' => $riwayatInvestasi
        ]);
    }

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

        Notification::create("Menambahkan paket investasi $packageName", "Anda berinvestasi pada paket $packageName");

        return redirect()->route('investment.invoice', ['code' => $investment->code]);
    }

    public function invoice(string $code)
    {
        $userId = Cookie::get('id');
        $investment = Investment::where('user_id', $userId)->where('code', $code)->firstOrFail();
        $banks = Bank::where('role', 'admin')->get();

        return view('user.investment.invoice', [
            'page' => 'investment',
            'banks' => $banks,
            'investment' => $investment
        ]);
    }

    public function confirmation(int $id)
    {
        $userId = Cookie::get('id');
        $investment = Investment::where('user_id', $userId)->where('id', $id)->firstOrFail();
        $riwayatInvestasi = Investment::with('package')->where('user_id', $userId)->get();
        $banks = Bank::where('role', 'admin')->get();

        return view('user.investment.confirmation', [
            'page' => 'investment',
            'banks' => $banks,
            'histories' => $riwayatInvestasi,
            'investment' => $investment
        ]);
    }

    public function confirmationPut(Request $request, int $id)
    {
        $userId = Cookie::get('id');
        $profile = Profile::where('user_id', $userId)->firstOrFail();
        $investment = Investment::with('package')
            ->where('id', $id)
            ->firstOrFail();

        if ($request->paymentTo === "wallet") {
            if ($profile->balance <= $investment->amount) {
                return back()->with('error', 'Saldo Anda tidak mencukupi.');
            }

            $profile->balance -= $investment->amount;
            $profile->save();

            $investment->update([
                'note' => $request->note,
                'isPaid' => true,
                'proof' => "balance.jpg",
                'paymentTo' => 'Saldo Dompet'
            ]);
        } else {
            if ($request->hasFile('proof')) {
                $file = $request->file('proof');
                $filename = "bukti-pembayaran-invest-" . time() . '.' . $file->extension();
                $file->storeAs('public/proof-payment/', $filename);

                $investment->update([
                    'note' => $request->note,
                    'proof' => $filename,
                    'isPaid' => true,
                    'paymentTo' => $request->paymentTo
                ]);
            } else {
                return back()->with('error', 'Silakan unggah bukti pembayaran.');
            }
        }

        return redirect()->route('investment.index')->with('success', 'Paket investasi ditambahkan.');
    }
}

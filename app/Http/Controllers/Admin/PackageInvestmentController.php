<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Package;
use App\Models\PackageInvestment;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Throwable;

class PackageInvestmentController extends Controller
{
    public function index()
    {
        return view('admin.product.add-package-investment', ['page' => 'investment', 'packages' => Package::get()]);
    }

    public function requestInvestment()
    {
        $invesment = Investment::with(['package', 'user'])->where('status', 'noactive')->get();

        return view('admin.product.request-investment', [
            'page' => 'investment',
            'investment' => $invesment
        ]);
    }

    public function approveInvestment($id)
    {
        // get investment
        $invesment = Investment::where('id', $id)->first();

        // check apakah user sudah membayar atau belum
        if ($invesment->isPaid == 0) {
            return back()->with('error', 'User hasn’t paid yet');
        }

        // get package
        $package = Package::where('id', $invesment->package_id)->first();

        // variabel buat nyimpan hari expires
        $expiresDay = 0;

        // ambil contract dan jadikan type number
        $contract = intval($package->contract);
        // ambil contract di package
        // check kondisi apaah day, week atau month
        // dan rubah menjadi satuan hari
        switch ($package->estimasiProfit) {
            case 'Daily':
                $expiresDay = $contract; // Anggap $package->contract sudah dalam hari
                break;
            case 'Weekly':
                $expiresDay = $contract * 7; // Mengalikan jumlah minggu dengan 7 hari
                break;
            case 'Monthly':
                $expiresDay = $contract * 30; // Mengalikan jumlah bulan dengan 30 hari (ini adalah estimasi; Anda bisa menyesuaikan sesuai kebutuhan)
                break;
            default:
                // Jika estimasi profit tidak sesuai dengan kategori yang diketahui
                // Anda bisa menetapkan nilai default atau menampilkan pesan kesalahan
                $expiresDay = 0; // Atau bisa menjadi nilai default yang sesuai
                break;
        }

        // save tanggal expries yang di tentukan dari hari ini + hari contract
        $invesment->expiresAt = now()->addDays($expiresDay);
        // update status investment menjadi aktif
        $invesment->status = 'active';
        // dan simpan
        $invesment->save();

        return back()->with('success', 'Acc success');
    }

    public function store(Request $request)
    {
        Package::create($request->all());
        return back()->with('success', 'Create Package Investment Success');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $package = Package::where('id', $id)->delete();
            return back()->with('success', 'Delete Success');
        } catch (\Throwable $e) {
            return back()->with('error', 'Delete data failed');
        }
    }
}

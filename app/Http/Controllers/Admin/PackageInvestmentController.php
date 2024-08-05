<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Package;
use App\Models\PackageInvestment;
use App\Models\User;
use Illuminate\Http\Request;

class PackageInvestmentController extends Controller
{
    public function index()
    {
        return view('admin.product.add-package-investment', ['page' => 'product', 'packages' => Package::get()]);
    }

    public function requestInvestment()
    {
        $invesment = Investment::with(['package', 'user'])->get();

        return view('admin.product.request-investment', [
            'page' => 'product',
            'investment' => $invesment
        ]);
    }

    public function accInvestment($id)
    {
        // get investment
        $invesment = Investment::where('id', $id)->first();

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
        // update procces yang dari pending ke success
        $invesment->proccess = 'success';
        // dan simpan
        $invesment->save();

        return back()->with('success', 'Acc success');
    }

    public function store(Request $request)
    {
        Package::create($request->all());
        return back()->with('success', 'Create Package Investment Success');
    }
}

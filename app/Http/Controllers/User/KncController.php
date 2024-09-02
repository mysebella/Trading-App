<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\Notification;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class KncController extends Controller
{
    /**
     * Menampilkan formulir KYC.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.knc', ['page' => 'knc.index']);
    }

    /**
     * Menangani pengiriman formulir KYC.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Ambil ID pengguna dari cookie
        $userId = Cookie::get('id');

        // Temukan pengguna berdasarkan ID
        $user = User::find($userId);

        // Periksa apakah pengguna ada
        if (!$user) {
            return back()->with('error', 'Pengguna tidak ditemukan');
        }

        if (Hash::check($request->password, $user->password)) {
            // Periksa apakah kedua file diunggah
            if ($request->hasFile('identityCard') && $request->hasFile('closeUpPhoto')) {
                // Ambil file
                $identity = $request->file('identityCard');
                $closeUp = $request->file('closeUpPhoto');

                // Hasilkan nama file
                $filenameIdentity = 'identity-card-' . $user->username . '-' . time() . '.' . $identity->extension();
                $filenameCloseUp = 'close-up-' . $user->username . '-' . time() . '.' . $closeUp->extension();

                // Simpan file
                $identity->storeAs('public/identity-card', $filenameIdentity);
                $closeUp->storeAs('public/close-up', $filenameCloseUp);

                // Perbarui profil dengan jalur file baru dan alamat
                Profile::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'closeUpPhoto' => $filenameCloseUp,
                        'identityCard' => $filenameIdentity,
                    ]
                );

                $user->status = 'pending';
                $user->save();

                Notification::create('Akun Aktif', 'Akun Berhasil Diaktifkan');

                return back()->with('success', 'Proses Verifikasi');
            }
            // Jika file tidak diunggah
            return back()->with('error', 'Kesalahan Verifikasi, File tidak ditemukan');
        }

        return back()->with('error', 'Kata sandi salah');
    }
}

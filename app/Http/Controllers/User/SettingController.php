<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function profile()
    {
        return view('user.setting.profile', ['page' => 'setting']);
    }

    public function profileUpdate(Request $request)
    {
        $user = $request->input('user');
        $profile = $request->input('profile');

        User::updateOrCreate(['id' => Cookie::get('id')], $user);
        Profile::updateOrCreate(['user_id' => Cookie::get('id')], $profile);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function profileUpdatePassword(Request $request)
    {
        $user = User::find(Cookie::get('id'));
        $password = $request->input('user');

        if ($password['newPassword'] == $password['confirmPassword']) {
            if (Hash::check($password['currentPassword'], $user->password)) {
                $user->password = Hash::make($password['newPassword']);
                $user->save();
                return back()->with('success', 'Password berhasil diubah');
            } else {
                return back()->with('error', 'Password saat ini salah');
            }
        } else {
            return back()->with('error', 'Password konfirmasi tidak cocok');
        }
    }

    public function image()
    {
        return view('user.setting.image', ['page' => 'setting']);
    }

    public function imageUpdate(Request $request)
    {
        // Cek jika pengguna mengunggah file
        if ($request->hasFile('photoProfile')) {

            // Ambil file foto
            $file = $request->file('photoProfile');

            // Buat nama untuk foto
            $filename = "foto-profil-" . time() . '.' . $file->extension();

            // Simpan foto
            $file->storeAs('public/photo-profile', $filename);

            // Perbarui profil pengguna
            Profile::where('user_id', Cookie::get('id'))->update(['photoProfile' => $filename]);

            // Kembali dengan pesan sukses
            return back()->with('success', 'Foto profil berhasil diunggah');
        }

        return back()->with('error', 'Kesalahan unggah');
    }

    public function bank() {}
}

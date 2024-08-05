<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Mockery\Generator\StringManipulation\Pass\Pass;

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

        return back()->with('success', 'Update Profile Success');
    }

    public function profileUpdatePassword(Request $request)
    {
        $user = User::find(Cookie::get('id'));
        $password = $request->input('user');

        if ($password['newPassword'] == $password['confirmPassword']) {
            if (Hash::check($password['currentPassword'], $user->password)) {
                $user->password = Hash::make($password['newPassword']);
                $user->save();
                return back()->with('success', 'password success change');
            } else {
                return back()->with('error', 'current password is wrong');
            }
        } else {
            return back()->with('error', 'confirm password not match');
        }
    }

    public function image()
    {
        return view('user.setting.image', ['page' => 'setting']);
    }

    public function imageUpdate(Request $request)
    {
        // check if user upload file
        if ($request->hasFile('photoProfile')) {

            // get photo
            $file = $request->file('photoProfile');

            // generate name for photo
            $filename = "photo-profile-" . time() . '.' . $file->extension();

            // save
            $file->storeAs('public/photo-profile', $filename);

            // update profile user
            Profile::where('user_id', Cookie::get('id'))->update(['photoProfile' => $filename]);

            // return back
            return back()->with('success', 'Upload photo profile success');
        }

        return back()->with('error', 'upload error');
    }
}

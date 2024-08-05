<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::firstOrCreate(['email' => $request->email, 'username' => $request->username], $request->all());

        if ($user->wasRecentlyCreated) {
            Profile::create(['user_id' => $user->id]);
            return back()->with('success', 'Register Success');
        } else {
            return back()->with('error', 'User already exist');
        }
    }

    public function signin(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Session::put('id', $user->id);
                return redirect('/')->cookie(Cookie::make('id', $user->id, 1440));
            } else {
                return back()->with('error', 'Credentials not valid');
            }
        } else {
            return back()->with('error', 'User not registered');
        }
    }
}

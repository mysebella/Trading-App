<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->orderBy('id', 'DESC')->get();
        return view('admin.users.users', ['page' => 'dashboard.users', 'users' => $users]);
    }

    public function edit($id)
    {
        return view('admin.users.view-user', ['page' => 'dashboard.users', 'usera' => User::with('profile')->find($id)]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();

        return back()->with('success', 'Successfully');
    }

    public function requestUser()
    {
        $users = User::with('profile')->where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('admin.users.request-verification', ['page' => 'dashboard.users', 'usera' => $users]);
    }

    public function putBalance(Request $request, $id)
    {
        $user = Profile::where('user_id', $id)->first();
        $user->balance = $user->balance + $request->balance;
        $user->save();
        return back()->with('success', 'Add Balance Successfully');
    }
}

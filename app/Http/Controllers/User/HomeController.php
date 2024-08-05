<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // ambil investmen yang sedang di jalani user
        $packageActive = Investment::with('package')
            ->where('user_id', Cookie::get('id'))
            ->where('status', 'active')->first();

        return view('user.home', [
            'page' => 'home',
            'packageActive' => $packageActive
        ]);
    }
}

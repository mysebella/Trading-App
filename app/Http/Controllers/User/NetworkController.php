<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class NetworkController extends Controller
{
    public function refferals()
    {
        return view('user.network.refferals', ['page' => 'network']);
    }

    public function generation()
    {
        return view('user.network.generation', ['page' => 'network']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function requestBalance()
    {
        return view('admin.balance.request-balance', ['page' => 'balance']);
    }

    public function requestWithdraw()
    {
        return view('admin.balance.request-withdraw', ['page' => 'balance']);
    }
}

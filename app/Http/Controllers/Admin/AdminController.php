<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function  addAccountBank(Request $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time() . '-bank-' . $request->bank . '.' . $file->extension();
            $file->storeAs('public/bank', $filename);

            Bank::create([...$request->all(), 'image' => $filename]);

            return back()->with('success', 'Create Bank Success');
        } else {
            return back()->with('error', 'Please Upload Image');
        }
    }

    public function addAccountBankDelete($id)
    {
        Bank::where('id', $id)->delete();
        return back()->with('success', 'Delete Success');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\File;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('admin.download', ['page' => 'download', 'files' => $files]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/file', $filename);

            File::create([
                ...$request->all(),
                'file' => $filename
            ]);

            return back()->with('success', 'Success Upload File');
        } else {
            return back()->with('error', 'File required, please upload a file');
        }
    }

    public function destroy($id)
    {
        try {
            File::where('id', $id)->delete();
            return back()->with('success', 'Delete Success');
        } catch (\Throwable $th) {
            return back()->with('error', 'Delete Failed');
        }
    }
}

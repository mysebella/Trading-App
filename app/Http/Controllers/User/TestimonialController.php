<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::where('status', 'success')->get();
        return view('user.testimonial.testimonial', ['page' => 'testimonial', 'testimonis' => $testimonis]);
    }

    public function addTestimonial()
    {
        $testimonis = Testimoni::with('user')->where('user_id', Cookie::get('id'))->get();
        return view('user.testimonial.add-testimonial', ['page' => 'testimonial', 'testimonis' => $testimonis]);
    }

    public function testimoniPost(Request $request)
    {
        $testimoni = Testimoni::where('user_id', Cookie::get('id'))->get();

        if (count($testimoni) >= 3) {
            return back()->with('error', 'Maksimal 3 Testimoni');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'testimoni-' . User::find(Cookie::get('id'))->name . '-' . now() . '.' . $file->extension();
            $file->storeAs('public/testimoni', $filename);

            Testimoni::create([
                'user_id' => Cookie::get('id'),
                'image' => $filename,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return back()->with('success', 'Testimoni berhasil di buat, akan di review sebelum di tampilkan');
        }
    }

    public function editTestimonial($id)
    {
        $testimonis = Testimoni::with('user')->where('user_id', Cookie::get('id'))->get();
        $testi = Testimoni::find($id);
        return view('user.testimonial.edit-testimonial', ['page' => 'testimonial', 'testimonis' => $testimonis, 'testi' => $testi]);
    }

    public function updateTestimonial(Request $request, $id)
    {
        $filename = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'testimoni-' . User::find(Cookie::get('id'))->name . '-' . now() . '.' . $file->extension();
            $file->storeAs('public/testimoni', $filename);
        }

        $testimoni = Testimoni::find($id);
        $testimoni->title = $request->title;
        $testimoni->description = $request->description;
        $testimoni->image = $filename ?? $testimoni->image;
        $testimoni->save();

        return redirect()->route('testimonial.add')->with('succes', 'update success');
    }
}

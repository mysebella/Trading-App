<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('user.testimonial.testimonial', ['page' => 'testimonial']);
    }

    public function addTestimonial()
    {
        return view('user.testimonial.add-testimonial', ['page' => 'testimonial']);
    }
}

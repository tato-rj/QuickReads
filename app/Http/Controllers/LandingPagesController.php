<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    public function pianolit()
    {
    	return view('landing-pages/pianolit', ['title' => 'Piano Lit']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    public function pianolit()
    {
    	return view('landing-pages/pianolit', ['title' => 'Piano Lit']);
    }

    public function subscribe(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email|unique:subscriptions'
    	]);

    	Subscription::create(['email' => $request->email]);

    	return back()->with('status', 'We\'ll let you know as soon as PianoLIT is available for download :)');
    }
}

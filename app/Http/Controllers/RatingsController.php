<?php

namespace App\Http\Controllers;

use App\User;
use App\Rating;
use App\Story;
use Illuminate\Http\Request;

class RatingsController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'facebook_id' => 'required',
            'title' => 'required',
            'score' => 'required|numeric'
        ]);

        $rating = Rating::create([
            'user_id' => User::where('facebook_id', '=',$request["facebook_id"])->pluck('id')[0],
            'story_id' => Story::where('title', '=',$request["title"])->pluck('id')[0],
            'score' => $request["score"]
        ]);

        return $rating;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($storyTitle)
    {
        $id = Story::where('title', $storyTitle)->pluck('id')[0];
        $story = Story::find($id);
        return $story->averageRating();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

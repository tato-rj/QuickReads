<?php

namespace App\Http\Controllers;

use App\Story;
use App\Author;
use App\Category;
use App\Http\Requests\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['app']]);
    }

    public function index()
    {

    }

    public function app()
    {
        $categories = Category::with('stories')->get();
        foreach ($categories as $category) {
            foreach ($category->stories as $story) {
                $story->setAttribute('average_rating', $story->averageRating());
                $story->setAttribute('story_filename', "https://leftlaneapps.com/storage/stories/$story->slug/".$story->slug.".jpeg");
                $story->setAttribute('author', $story->creator->name);
                $story->setAttribute('life', $story->creator->life);
                $story->setAttribute('dates', '('.$story->creator->born_in.' - '.$story->creator->died_in.')');
            }
        }

        return $categories;
    }

    public function text(Request $request)
    {
        $story = Story::where('id', $request->id)->pluck('text');

        return $story;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('pages/stories/add', compact(['authors', 'categories']));
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
            'title' => 'required|unique:stories|max:255',
            'summary' => 'required',
            'text' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'time' => 'required',
            'cost' => 'required',
        ]);

        $story = Story::create([
            'slug' => str_slug($request->title),
            'title' => $request->title,
            'summary' => $request->summary,
            'text' => $request->text,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'time' => $request->time,
            'cost' => $request->cost
        ]);

        $this->saveFile($request);

        return redirect()->back()->with('success', "$request->title has been successfully added!");
    }

    public function saveFile($request)
    {
        if ($request->file('image')) {
            $slug = str_slug($request->title);
            (new Upload($request->file('image')))->name($slug)->path("/public/stories/$slug/")->save();            
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        $stories = Story::orderBy('title')->get();
        return view('pages/stories/edit', compact(['stories']));
    }

    public function edit(Story $story)
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $stories = Story::orderBy('title')->get();
        return view('pages/stories/edit', compact(['stories', 'story', 'authors', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $slug = str_slug($request->title);

        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'text' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'time' => 'required',
            'cost' => 'required',
        ]);

        $story->update([
            'slug' => $slug,
            'title' => $request->title,
            'summary' => $request->summary,
            'text' => $request->text,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'time' => $request->time,
            'cost' => $request->cost
        ]);

        $this->saveFile($request);

        return redirect("/quickreads/stories/edit/$slug")->with('success', "$request->title has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $stories = Story::orderBy('title')->get();
        return view('pages/stories/delete', compact(['stories']));       
    }

    public function destroy(Story $story)
    {
        File::deleteDirectory("storage/stories/$story->slug");
        $story->delete();
        return redirect()->back()->with('success', "$story->title has been successfully removed!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function app()
    {
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/categories/add');
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
            'name' => 'required|unique:categories|max:120'
        ]);

        $category = Category::create([
            'slug' => str_slug($request->name),
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', "$request->name has been successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function select()
    {

        $categories = Category::orderBy('name')->get();
        return view('pages/categories/edit', compact(['categories']));
    }

    public function edit(Category $category)
    {
        $categories = Category::orderBy('name')->get();
        return view('pages/categories/edit', compact(['category', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $slug = str_slug($request->name);

        $request->validate([
            'name' => 'required|max:120'
        ]);

        $category->update([
            'slug' => $slug,
            'name' => $request->name,
            'sorting_order' => $request->sorting_order
        ]);

        return redirect("/categories/edit/$slug")->with('success', "$request->name has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $categories = Category::orderBy('name')->get();
        return view('pages/categories/delete', compact(['categories']));        
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', "$category->name has been successfully removed!");
    }
}

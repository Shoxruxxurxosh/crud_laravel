<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Category();


        $categories['name']=$request->name;

        $categories->save();
        
        return redirect()->route("post.create",$categories->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        $categories = Category::all();
        return view('post.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $post)
    {
        $category->delete();
        return redirect(route('create'));
    }
}
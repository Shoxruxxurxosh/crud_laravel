<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('index',compact('posts'));
    }


    public function search(Request $request){

        $search = $request->search;

        $posts =Post::where(function($query) use ($search){

            $query->where('title','like',"%$search%")
            ->orWhere('description','like',"%$search%");

            })
            ->orWhereHas('category',function($query) use($search){
                $query->where('name','like',"%$search%");
            })
            ->get();
            
            return view('index',compact('posts','search'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create')->with([
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();

        if($request->hasFile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('post-image',$name);
        }

        $post['image']=$path ?? null;
        $post['name']=$request->name;   
        $post['title']=$request->title;
        $post['description']=$request->description;
        $post['category_id']=$request->category_id;


        $post->save();

        return redirect()->route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('index' ,compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}           
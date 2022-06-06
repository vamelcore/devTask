<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Show all list
     */
    public function index()
    {
        $posts = Post::all()->sortBy('sort_order');

        return view("posts.index", compact("posts"));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        $filename = pathinfo($request->file("image")->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file("image")->getClientOriginalExtension();
        $fileNameToStore = $filename."_".time().".".$extension;
        $data["image"] = $request->file("image")->storeAs("public/posts", $fileNameToStore);

        Post::create($data);

        return redirect()->route("posts.index")->with("success","Post created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();

        if ($request->hasFile("image")) {
            $filename = pathinfo($request->file("image")->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file("image")->getClientOriginalExtension();
            $fileNameToStore = $filename."_".time().".".$extension;
            $data["image"] = $request->file("image")->storeAs("public/posts", $fileNameToStore);
        }

        $post->update($data);

        return redirect()->route("posts.index")->with("success","Post updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("posts.index")->with("success","Post deleted successfully");
    }
}

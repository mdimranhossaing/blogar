<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post_cache = Cache::remember('posts', now()->addMinute(), function () use ($post) {
            return $post;
        });
        return view(
            'pages.post.posts',
            [
                'posts' => $post_cache->orderBy('id', 'DESC')->paginate(3)
                // 'posts' => $post->paginate(2)
            ]
        );
    }

    public function single(Post $post){
        return view(
            'pages.post.single ',
            [
                'post'  =>  $post
            ]
        );
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
        //
    }
}

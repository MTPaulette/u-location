<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Theme;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia("Guest/Post/allPost", [
            'posts' => Post::orderByDesc('created_at')
                    ->withCount('images')
                    ->with('images')
                    ->with('theme')
                    ->paginate(5)
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['images', 'user', 'theme']);
        return Inertia("Guest/Post/postDetail", [
            'post' => $post,
            'themes' => Theme::orderBy('created_at')->get(),
            'popularPosts' => Post::orderByDesc('created_at')
                                ->with('images')
                                ->with('theme')
                                ->get()
                                ->take(4)
        ]);
    }

    /**
     * Display the all posts of this theme.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function getPostsByTheme(Theme $theme)
    {
        return Inertia("Guest/Post/postsByTheme", [
            'theme' =>  $theme,
            'themes' => Theme::all(),
            'posts' => Post::where('theme_id', '=', $theme->id)
                            ->orderByDesc('created_at')
                            ->with('theme')
                            ->with('images')
                            ->paginate(5)
        ]);
    }
}

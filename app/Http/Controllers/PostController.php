<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Image;
use App\Models\Post;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'informations' =>  Info::find(1),

            /* 
            'images' =>  DB::table('images')
                            ->select('id', 'filename', 'post_id')
                            ->whereNotNull('post_id')
                            ->orderByDesc('created_at') // get first images
                            ->take(5) //or limit(5)
                            ->get(),
            */

            'posts' => Post::orderByDesc('created_at')
                            ->withCount('images')
                            ->with('images')
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
        // if(Auth::user()->can("view", $post)) {
           // abort(403);
        // };

        //$this->authorize('view', $post);

        $post->load(['images', 'user']);
        return Inertia("Guest/Post/postDetail", [
            'informations' =>  Info::find(1),
            'post' => $post,
            'themes' => Theme::all(),
            'popularPosts' => Post::orderByDesc('created_at')
                                ->with('images')
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
            'informations' =>  Info::find(1),
            'theme' =>  $theme,
            'themes' => Theme::all(),
            'posts' => Post::where('theme_id', '=', $theme->id)
                            ->orderByDesc('created_at')
                            ->with('images')
                            ->paginate(5)
        ]);
    }
}

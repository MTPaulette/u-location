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

            'images' =>  DB::table('images')
                            ->select('id', 'filename', 'post_id')
                            ->whereNotNull('post_id')
                            ->orderByDesc('created_at') // get first images
                            ->take(5) //or limit(5)
                            ->get(),

            'posts' => Post::orderByDesc('created_at')
                            ->withCount('images')
                            ->with('images')
                            ->paginate(5)
        ]);
    }

    /*
            'posts' => Post::join('images', 'posts.id', '=', 'images.post_id')
                    // DB::table('posts')
                    // ->join('images', 'posts.id', '=', 'images.post_id')
                    ->select('posts.*', 'images.*')
                    //->get()
                    //->orderByDesc('posts.created_at')
                    // ->withCount('images')
                    ->groupBy('posts.id')
                    ->paginate(5)

            'posts' => DB::table('posts')
                    ->join('images', 'posts.id', '=', 'images.post_id')
                    ->select('posts.*', 'images.*', DB::raw('count(*)'))
                    ->groupBy('posts.id')
                    //->orderByDesc('posts.created_at')
                    // ->withCount('images')
                    ->paginate(5)
                    
            'posts' => 
                    Post::join('images', 'posts.id', '=', 'images.post_id')
                    ->select('posts.*', 'images.*')
                    ->groupBy('images.post_id')
                    //->orderByDesc('posts.created_at')
                    ->withCount('images')
                    ->paginate(5)

            'posts' => Post::orderByDesc('created_at')
                    ->withCount('images')
                    ->paginate(5)
                     */
    
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

        $post->load(['images']);
        return Inertia("Guest/Post/postDetail", [
            'informations' =>  Info::find(1),
            'post' => $post,
            'categories' => Theme::all(),
            'popularPosts' => Post::orderByDesc('created_at')
                                ->with('images')
                                ->get()
                                ->take(4)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Post;
use App\Models\Theme;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class PostDashboardController extends Controller
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
        return Inertia("Dashboard/Post/List", [
            'informations' =>  Info::find(1),
            'posts' => 
                    Post::select('posts.*')
                    // DB::table('posts')
                    ->leftJoin('users', 'users.id', '=', 'posts.user_id')
                    ->leftJoin('themes', 'themes.id', '=', 'posts.theme_id')
                    ->select('posts.*', 'users.email as user', 'themes.title as theme')
                    ->orderByDesc('created_at')
                    ->withCount('images')
                    ->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia("Dashboard/Post/Add", [
            'themes' =>  Theme::all('id', 'title'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->user()->id);
        
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->theme_id = $request->theme_id;
        $post->user_id = $request->user()->id;

        $post->save();
        return redirect()->route('dashboard.post.index')->with('success', 'post successfully created');
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

        return Inertia("Guest/Post/postDetail", [
            'informations' =>  Info::find(1),
            'post' => $post,
            'categories' => Theme::all(),
            'popularPosts' => Post::all()->take(4),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

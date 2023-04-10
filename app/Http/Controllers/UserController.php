<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia("Dashboard/User/List", [
            'users' => User::orderByDesc('created_at')
                    ->paginate(10)
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia("Dashboard/User/Profile", [
            'user' => User::find($id),
        ]);
    }
}

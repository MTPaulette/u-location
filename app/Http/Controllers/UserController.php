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
        // dd(Post::orderByDesc('created_at')->paginate(5));
        return Inertia("Dashboard/User", [
            'users' => User::orderByDesc('created_at')
                    ->paginate(5)
        ]);
    }
}

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create(
            $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique',
            'password' => 'required|min:6',
        ]));
        return to_route('user.index')->with('success', 'user was successfully created!!!');
        // return redirect('/post)
    }

    public function createPDF() {
        $users = User::orderByDesc('created_at')->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('download/users', compact('users'));
        // return $pdf->download('agrimax_users_list'.now().'.pdf');
        return $pdf->stream('agrimax_users_list'.now().'.pdf');
    }
}

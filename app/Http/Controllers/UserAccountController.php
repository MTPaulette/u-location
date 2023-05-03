<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create() {
        return Inertia("Authentification/register");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Inertia("Dashboard/User/Profile", [
            'user' => Auth::user(),
            'countries' =>  Country::all('id', 'name'),
            'cities' =>  City::all('id', 'name'),
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
        $user = User::create(
            $request->validate([
            'firstname' => 'max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]));
        
        Auth::login($user);
        event(new Registered($user));
        
        return to_route('user.index')->with('success', 'user was successfully created!!!');
        // return redirect('/post)
    }
    


    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        dd($request->user());

        //$user = Auth::user();
        $user = $request->user();
        if($request->has('firstname') && isset($request->firstname)) {
            $user->firstname = $request->firstname;
        }
        if($request->has('lastname') && isset($request->lastname)) {
            $user->lastname = $request->lastname;
        }
        if($request->has('telephone') && isset($request->telephone)) {
            $user->telephone = $request->telephone;
        }
        if($request->has('email') && isset($request->email)) {
            $user->email = $request->email;
        }
        if($request->has('city_id') && isset($request->city_id)) {
            $user->city_id = $request->city_id;
        }
        if($request->has('address') && isset($request->address)) {
            $user->address = $request->address;
        }

        $user->update();

        //$request->user()->update(array_filter($request->all()));

        return redirect()->back()->with('success', 'profile was successfully updated!!!');
        // return redirect('/dashboard')->with('success', 'profile was successfully updated!!!');
    }
    
    public function update1(Request $request)
    {
        // dd($request->user());

        //$user = Auth::user();

        $request->user()->update([
            'password' => $request->password,
        ]);

        return redirect('/dashboard')->with('success', 'password was successfully modified!!!');
        // return back()->with('success', 'password was successfully modified!!!');
    }
}

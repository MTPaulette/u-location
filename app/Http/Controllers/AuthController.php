<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create() {
        return Inertia("Authentification/login");
    }

    public function store(Request $request) {
        if(!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Authentification failed'
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');

        return Inertia("Authentification/reset");
    }
}

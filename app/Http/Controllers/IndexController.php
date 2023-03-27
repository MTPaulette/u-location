<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return Inertia("Guest/Index/index");
    }

    public function contact() {
        return Inertia("Guest/Index/contact");
    }
    
    public function about() {
        return Inertia("Guest/Index/about");
    }

    public function notFound() {
        return Inertia("Guest/Index/notFound");
    }

    public function login() {
        return Inertia("Authentification/login");
    }
}

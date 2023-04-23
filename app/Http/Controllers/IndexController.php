<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return Inertia("Guest/index");
    }

    public function contact() {
        return Inertia("Guest/contact");
    }
    
    public function about() {
        return Inertia("Guest/about");
    }

    public function notFound() {
        return Inertia("Guest/notFound");
    }

    public function dashboard() {
        return Inertia("Dashboard/Home");
    }
}

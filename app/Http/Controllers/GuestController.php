<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return Inertia("Guest/index", [
            'informations' =>  Info::find(1),
        ]);
    }

    public function contact() {
        return Inertia("Guest/contact", [
            'informations' =>  Info::find(1),
        ]);
    }
    
    public function about() {
        return Inertia("Guest/about", [
            'informations' =>  Info::find(1),
        ]);
    }

    public function notFound() {
        return Inertia("Guest/notFound", [
            'informations' =>  Info::find(1),
        ]);
    }

    public function cart() {
        return Inertia("Guest/cart", [
            'informations' =>  Info::find(1),
            'products' => Product::orderByDesc('created_at')
                    ->paginate(10)
        ]);
    }

    public function dashboard() {
        return Inertia("Dashboard/Home");
    }
}

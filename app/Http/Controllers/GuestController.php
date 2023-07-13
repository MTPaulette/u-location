<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\Country;
use App\Models\City;
use App\Models\Address;

class GuestController extends Controller
{
    public function index() {
        return Inertia("Guest/index", [
            'products' => Product::orderByDesc('created_at')
                                ->with('images')
                                ->with('category')
                                ->with('weights')
                                ->get()
                                ->take(40),

            'posts' => Post::orderByDesc('created_at')
                                ->with('images')
                                ->with('theme')
                                ->get()
                                ->take(4)
        ]);
    }

    public function contact() {
        return Inertia("Guest/contact");
    }
    
    public function about() {
        return Inertia("Guest/about");
    }

    public function dashboard() {
        return Inertia("Dashboard/Home");
    }
    
    public function checkout()
    {
        return Inertia("Guest/checkout", [
            'countries' => Country::orderBy('name', 'asc')->get(),
            'cities' => City::orderBy('name', 'asc')->get()->groupBy('country_id'),
            'addresses' => Address::orderBy('street', 'asc')
                                        ->with('city')
                                        ->get()
                                        ->groupBy('city_id'),
        ]);
    }
}

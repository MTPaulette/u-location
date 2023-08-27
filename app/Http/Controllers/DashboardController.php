<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DashboardController extends Controller
{
    public function home() {
        return Inertia("Dashboard/Home");
    }
    
    function statistic() {
        return Inertia("Dashboard/Statistic");
    }
}

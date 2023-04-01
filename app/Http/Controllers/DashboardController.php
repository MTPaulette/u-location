<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home() {
        return Inertia("Dashboard/Home");
    }
    
    function statistic() {
        return Inertia("Dashboard/Statistic");
    }
}

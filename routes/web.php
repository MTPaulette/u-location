<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[IndexController::class, "index"]);
Route::get("/contact",[IndexController::class, "contact"]);
Route::get("/about",[IndexController::class, "about"]);
Route::get("/notFound",[IndexController::class, "notFound"]);

Route::get("/register",[IndexController::class, "register"]);
Route::get("/login",[IndexController::class, "login"]);
Route::get("/reset",[IndexController::class, "reset"]);

Route::get("/dashboard",[DashboardController::class, "home"]);
Route::get("/statistic",[DashboardController::class, "statistic"]);
Route::get("/notifications",[DashboardController::class, "notification"]);

Route::resource("post", PostController::class);

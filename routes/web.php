<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserImageController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\PostImageController;
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

Route::get("/",[GuestController::class, "index"])->name("index");
Route::get("/contact",[GuestController::class, "contact"]);
Route::get("/about",[GuestController::class, "about"]);
Route::get("/notFound",[GuestController::class, "notFound"]);
Route::get("/cart",[GuestController::class, "cart"]);


Route::middleware('auth')->group(function () {
  Route::get("/dashboard",[DashboardController::class, "home"]);
  Route::get("/statistic",[DashboardController::class, "statistic"]);
  Route::get("/notifications",[DashboardController::class, "notification"]);
});

Route::resource("user", UserController::class);
  Route::resource("post", PostController::class);
  Route::resource("product", ProductController::class);

Route::middleware('auth')->group(function () {
  Route::resource("invoice", OrderController::class);
});

Route::get("/login",[AuthController::class, "create"])->name("login");
Route::post("/login",[AuthController::class, "store"])->name("login");
Route::delete("/logout",[AuthController::class, "destroy"])->name("logout");

Route::get("/register",[UserAccountController::class, "create"])->name("register");
Route::post("/register",[UserAccountController::class, "store"])->name("register");

Route::middleware('auth')->group(function () {
  Route::get('/profile', [UserAccountController::class, 'show'])->name('profile');
  Route::put('/profile', [UserAccountController::class, 'update'])->name('profile.update');
  Route::resource('userImage', UserImageController::class)->only(['store','destroy']);
  Route::resource('product.image', ProductImageController::class)->only(['create', 'store','destroy']);
  Route::resource('post.image', PostImageController::class)->only(['create', 'store','destroy']);
  Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});
// Route::middleware('auth')->group(function () {});

  // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

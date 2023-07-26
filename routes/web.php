<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostDashboardController;
use App\Http\Controllers\ProductDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserImageController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\PostImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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
Route::get("/checkout",[GuestController::class, "checkout"]);


Route::resource("post", PostController::class)->only(['index', 'show']);
Route::resource("product", ProductController::class)->only(['index', 'show']);

/* cart routes */
Route::resource("cart", CartController::class)->only(['index', 'store', 'update', 'destroy']);
Route::delete("/clearCart",[CartController::class, "clear"])->name('cart.clear');

/* search post by them and product by category */
Route::get("/posts/category/{theme}",[PostController::class, "getPostsByTheme"])->name("PostsByTheme");
Route::get("/products",[ProductController::class, "getProductsFiltered"])->name("product.filters");

/* authentification's route */
Route::get("/login",[AuthController::class, "create"])->name("login");
Route::post("/login",[AuthController::class, "store"])->name("login");
Route::delete("/logout",[AuthController::class, "destroy"])->name("logout");

Route::get("/register",[UserAccountController::class, "create"])->name("register");
Route::post("/register",[UserAccountController::class, "store"])->name("register");

Route::get("/reset",[PasswordController::class, "create"])->name("reset");
Route::post("/reset",[PasswordController::class, "store"])->name("reset");

Route::resource("order", OrderController::class);

Route::middleware('auth')->group(function () {
  Route::get("/dashboard",[DashboardController::class, "home"])->name("dashboard");
  Route::get("/statistic",[DashboardController::class, "statistic"]);
  Route::get("/notifications",[DashboardController::class, "notification"]);
  Route::resource("invoice", InvoiceController::class);
});


Route::middleware('auth')->group(function () {
  Route::get('/profile', [UserAccountController::class, 'show'])->name('profile');
  Route::put('/profile', [UserAccountController::class, 'update'])->name('profile.update');
  Route::resource('userImage', UserImageController::class)->only(['store','destroy']);
  Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
  Route::resource("user", UserController::class);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
  Route::resource("category",CategoryController::class)->only(['index','store','update','destroy']);
  Route::resource("theme",ThemeController::class)->only(['index','store','update','destroy']);
  Route::resource("advantage",AdvantageController::class)->only(['index','store','update','destroy']);
  Route::resource("ingredient",IngredientController::class)->only(['index','store','update','destroy']);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
  Route::prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
      Route::resource('product.image', ProductImageController::class)->only(['create', 'store','destroy']);
      Route::resource('post.image', PostImageController::class)->only(['create', 'store','destroy']);
      Route::resource("post", PostDashboardController::class);
      Route::resource("product", ProductDashboardController::class);
      Route::resource("order", OrderDashboardController::class);
  });
});


Route::prefix('export')
->group(function () {
    Route::get('/posts', [PostDashboardController::class, 'createPDF']);
    Route::get('/products', [ProductDashboardController::class, 'createPDF']);
    // Route::get('/order', [OrderController::class, 'createPDF'])->name('export.order');
    Route::get('/order/{order}', [OrderController::class, 'createPDF'])->name('export.order');
    Route::get('/users', [UserController::class, 'createPDF']);    
});

  // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

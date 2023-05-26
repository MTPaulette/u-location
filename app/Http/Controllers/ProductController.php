<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Info;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia("Dashboard/Product/List", [
            'products' => Product::orderByDesc('created_at')
                    ->withCount('images')
                    ->paginate(10)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Display the all products of this category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function getProductsByCategory(Category $category)
    {
        return Inertia("Guest/Product/productsByCategory", [
            'informations' =>  Info::find(1),
            'category' =>  $category,
            'categories' => Category::orderBy('name', 'asc')->get(),
            'products' => Product::where('category_id', '=', $category->id)
                            ->orderByDesc('created_at')
                            ->with('images')
                            ->paginate(5)
        ]);
    }
}

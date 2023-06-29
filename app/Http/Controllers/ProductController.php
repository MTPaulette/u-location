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
    public function index(Request $request)
    {
        return Inertia("Guest/Product/allProduct", [
            'filters' => $request->only(['category, q']),
            'products' => Product::orderByDesc('created_at')
                            ->withCount('images')
                            ->with('images')
                            ->paginate(5)
                            ->withQueryString()
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
        /*
        $categories = $product->categories;
        foreach ($categories as $category) {
            $similarProducts = $category->products->shuffle()->with('images')->take(4);
        }
        */
        $product->load(['images', 'advantages', 'ingredients', 'weights']);
        return Inertia("Guest/Product/productDetail", [
            'product' => $product,
            'popularProducts' => Product::orderByDesc('created_at')
                                ->with('images')
                                ->get()
                                ->take(4)
        ]);
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
            'category' =>  $category,
            'products' => Product::where('category_id', '=', $category->id)
                            ->orderByDesc('created_at')
                            ->with('images')
                            ->paginate(5)
        ]);
    }
}

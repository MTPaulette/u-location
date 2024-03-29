<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            'products' => Product::orderByDesc('created_at')->withCount('images')
                            ->with('category')
                            ->with('images')
                            ->paginate(5)
                            // ->withQueryString()
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
        $product->load(['images', 'advantages', 'ingredients', 'weights', 'category']);
        return Inertia("Guest/Product/productDetail", [
            'product' => $product,
            'popularProducts' => Product::orderByDesc('created_at')
                                ->with('images')
                                ->with('category')
                                ->get()
                                ->take(4)
        ]);
    }
    
    /**
     * Display the all products filtered.
     */
    public function getProductsFiltered1(Category $category)
    {
        return Inertia("Guest/Product/productsFiltered", [
            'category' =>  $category,
            'products' => Product::where('category_id', '=', $category->id)
                            ->orderByDesc('created_at')
                            ->with('images')
                            ->with('category')
                            ->paginate(5)
        ]);
    }

    public function getProductsFiltered(Request $request)
    {
        $filters = $request->query();

        /**
         * how to filters data controller side? (filters parameters are passing in handleInertiaRequests as global props)
         * method 1: use if statement
         * method 2: with when method
         * method 3: in the product model
         * here the $value is the return of the examination of the if statement:$filters['category'] ?? false
        */

        // method 2
        $query = Product::orderByDesc('created_at')
                ->when(
                    $filters['category'] ?? false,
                    function($query, $value) {
                        $category_id = Category::select('id')->where('name', '=', $value)->first()->id;
                        $query->where('category_id', '=', $category_id);
                    }
                    // fn($query, $value) => $query->where('category_id', '=', $value)
                )
                ->when(
                    $filters['q'] ?? false,
                    fn($query, $value) => $query->where('name', 'LIKE', "%$value%")->orWhere('description', 'LIKE', "%$value%")
                );

        /*
            // method 1
            $query = Product::orderByDesc('created_at');
            if($filters['category'] ?? false ) {
                $query->where('category_id', '=', $filters['category']);
            }

            if($filters['q'] ?? false ) {
                $q = $filters['q'];
                $query->where('name', 'LIKE',"%$q%")->orWhere('description', 'LIKE',"%$q%");
            }
        */
        
        return Inertia("Guest/Product/productsFiltered", [
            'products' => $query->withCount('images')
                            ->with('images')
                            ->with('category')
                            ->paginate(5)
                            ->withQueryString()
        ]);
    }
}

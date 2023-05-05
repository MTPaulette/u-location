<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Advantage;
use App\Models\Weight;
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
                    ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia("Dashboard/Product/Add", [
            'advantages' =>  Advantage::all('id', 'name'),
            'ingredients' =>  Ingredient::all('id', 'name'),
            'weights' =>  Weight::all('id', 'name'),
            'categories' =>  Category::all('id', 'name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->user()->id);
        
        $product = new Product();
        $product->code = "PROD_".$request->name;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->preparation = $request->preparation;
        $product->utilisation = $request->utilisation;
        $product->category_id = $request->category_id;
        $product->user_id = $request->user()->id;

        $product->save();

        return Product::latest()->first()->id;
        
        /*
        return redirect()->route('/product')->with('success', 'product created');
        */
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Advantage;
use App\Models\Weight;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductDashboardController extends Controller
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
            'products' => Product::orderBy('created_at')
                    ->withCount('images')
                    ->with(['images', 'advantages', 'ingredients', 'weights'])
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
            'advantages' =>  Advantage::select('id', 'name')->orderBy('name', 'asc')->get(),
            'ingredients' =>  Ingredient::select('id', 'name')->orderBy('name', 'asc')->get(),
            'weights' =>  Weight::all('id', 'name' ),
            'categories' =>  Category::select('id', 'name')->orderBy('name', 'asc')->get(),
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
        // dd($request->weights);
        
        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->name;
        $product->description = $request->description;
        $product->preparation = $request->preparation;
        $product->utilisation = $request->utilisation;
        $product->category_id = $request->category_id;
        $product->user_id = $request->user()->id;

        $product->save();
        // dd($product->id);
        $product->code = "AGPROD".substr(strtoupper($request->name),0,2,).$product->id;
        $product->save();

        foreach($request->ingredients as $ingredient) {
            $product->ingredients()->attach($ingredient['id']);
        }

        foreach($request->advantages as $advantage) {
            $product->advantages()->attach($advantage['id']);
        }

        foreach($request->weights as $weight) {
            $product->weights()->attach($weight['weight_id'], ['price' => $weight['price'], 'initial_stock' => $weight['initial_stock'], 'remaining_stock' => $weight['initial_stock']]);
        }

        return redirect()->route('admin.product.index')->with('success', 'product successfully created');
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
    
    public function createPDF() {
        $products = Product::orderByDesc('created_at')
                                ->with('images')
                                ->withCount('images')
                                ->get();
        // dd($products);
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('download/products', compact('products'));
        // return $pdf->download('agrimax_products_list'.now().'.pdf');
        return $pdf->stream('agrimax_products_list'.now().'.pdf');
    }
}

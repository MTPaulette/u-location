<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return Inertia("Dashboard/Product/ProductImage/Create", [
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        // dd($request->hasFile('images'));
        if($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpg,png,jpeg,webp|max:5000'
            ], [
                'images.*.mimes' => 'the file should be in one of the formats: jpg, png, jpeg, webp'
            ]);

            foreach ($request->file('images') as $file){
                $path = $file->store('images', 'public');
                $product->images()->save(new Image([
                    'filename' => $path
                ]));
            }
        }
        
        return redirect()->back()->with('success', 'images uploaded!!!');
        //return to_route('profile')->with('success', 'images successfully added!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

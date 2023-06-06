<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Product;
use App\Models\Weight;

class CartController extends Controller
{
    public function index()
    {
        return Inertia("Guest/cart", [
            'informations' =>  Info::find(1),
            'products' => Product::orderByDesc('created_at')
                    ->paginate(10)
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
        // dd($request);
        $product = $request->product;
        $product_id = $request->product['id'];
        $weight_id = $request->weight_id;
        $qty = $request->qty;
        $price = $request->price;

        // dd($request->product['weights'][$weight_id]);

        $cart = session()->get('cart', []);
        if(isset($cart[$product_id])) {
            dd('bjrrrrrrrrrrr');
            if(isset($cart[$product_id]->weightQty[$weight_id])) {
                $cart[$product_id]->weightQty[$weight_id]->qty = $cart[$product_id]->weightQty[$weight_id] + $qty;
            }
        } else {
            $cart[$product_id] = [
                "name" => $product['name'],
                "image" => $product['images'],
                "weightQty" => [
                    $weight_id => [
                        'weight' => Weight::find($weight_id),
                        'qty' => $qty,
                        'price' => $price,
                    ]
                ]
            ];
        }

        dd($cart);
        //session()->put('cart', $cart);
        //return redirect()->back()->with('success', 'product has been added to cart!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

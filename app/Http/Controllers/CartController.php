<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\Product;
use App\Models\Weight;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return Inertia("Guest/cart", [
            'informations' =>  Info::find(1),
            'cartItems' => Cart::instance('default')->content(),
            'cartnb' => Cart::instance('default')->count(),
            // 'products' => Product::orderByDesc('created_at')->paginate(10)
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
        $product = $request->product;
        $product_id = $request->product['id'];
        $weight_id = $request->weight_id;
        $weight_name = $request->weight;
        $qty = $request->qty;
        $price = $request->price;

        // $cart1 = Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);

        Cart::instance('default')->add($product_id, $product['name'], $qty, $price, $weight_id, [
            'totalQty'=>$request->totalQty,
            'product' => $product,
            'product_code' => $product['code'],
            'weight_name' => $weight_name,
            'images' => $product['images'][0],
            'description' => $product['description'],
            'remaining_stock' => $request->remaining_stock
        ])->associate('App\Models\Product');
        // dd($cart2);
        return redirect()->back()->with('success', 'product has been added to cart!');
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
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::instance('default')->remove($rowId);
        return redirect()->back()->with('success', 'product has been removed to cart!');
    }
}

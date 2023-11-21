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
        $cart = Cart::instance('default');
        /*
            $cartTaxRate = config('cart.tax');
            $tax = config('cart.tax')/100;
            $cartTax = $subtotal*$tax;
        */
        return Inertia("Guest/cart"
        
        /*, [
            'cartItems' => $cart->content(),
            'cartcount' => $cart->count(),
            'subtotal' => $cart->subtotal(),
            
                'carttaxrate' => $cartTaxRate,
                'carttax' => $cartTax,
                'total' => $cart->total(),
        ]*/
    );
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

        Cart::instance('default')->add($product_id, $product['name'], $qty, $price, $weight_id, [
            'totalPrice'=>$qty*$price,
            'product' => $product,
            'product_code' => $product['code'],
            'weight_name' => $weight_name,
            'images' => $product['images']?$product['images'][0]: null,
            'description' => $product['description'],
            'remaining_stock' => $request->remaining_stock
        ])->associate('App\Models\Product');
        
        // return redirect()->route('product.show', $product_id)->with('success', 'product has been added to cart!');
        return redirect()->back()->with('success', 'product has been added to cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $cart = Cart::instance('default');
        $cartItem = $cart->get($rowId);
        $cartItemOptions = $cartItem->options;

        $qty = $request->qty;
        $price = $cartItem->price;

        $cart->update($rowId, $qty);
        $cart->update($rowId, ['options' => [
            'totalPrice' => $qty*$price,
            'product' => $cartItemOptions->product,
            'product_code' => $cartItemOptions->product_code,
            'weight_name' => $cartItemOptions->weight_name,
            'images' => $cartItemOptions->images,
            'description' => $cartItemOptions->description,
            'remaining_stock' => $cartItemOptions->remaining_stock
        ]]);
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

    /**
     * Remove all resources in the cart
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        Cart::instance('default')->destroy();
        return redirect()->route('product.index')->with('success', 'the cart is empty now!');
    }
}

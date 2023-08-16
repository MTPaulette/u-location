<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\User;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Inertia('Dashboard/Order/List', [
            // 'orders' => Order::orderByDesc('created_at')->with('products')->get(),
            // 'orders' => Auth::user()->orders()->with('products')->orderByDesc('created_at')->get(),
            'orders' => Auth::user()->orders()
                                    ->with('address')
                                    ->with('products')
                                    ->orderByDesc('created_at')
                                    ->get(),
            'user' => Auth::user(),
            // latest()->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $order = new Order();
        $order->subtotal = $request->subtotal;
        $order->paiement_mode = $request->paiement_mode;
        if($request->user()) {
            $user = $request->user();
            $order->user_id = $user->id;
        }else {
            $user = User::create(
                $request->validate([
                'firstname' => 'max:50',
                'lastname' => 'required|max:50',
                'email' => 'required|email|unique:users',
                'password' => '',
                'telephone' => 'required',
                // 'password' => 'required|min:6|confirmed',
            ]));
           // $user->password = $request->lastname.'_'.date('Y');
            $order->user_id = $user->id;
        }

        if($request->new_address) {
            $address = new Address();
            $address->city_id = $request->city_id;
            $address->street = $request->street;
            $address->save();
            $order->address_id = $address->id;
           // dd($address->id);

        }else {
            $order->address_id = $request->address_id;
        }

        $order->save();
        $cartItems = Cart::instance('default')->content();
        foreach($cartItems as $cartItem) {
            $order->products()->attach($cartItem->id, [
                'weight' => $cartItem->options->weight_name,
                // 'weight' => $cartItem->weight,
                'price' => $cartItem->price,
                'qty' => $cartItem->qty,
                'totalPrice' => $cartItem->options->totalPrice
            ]);
            // $order->products()->attach($cartItem->id, ['weight' => $cartItem->weight, 'quantity' => $cartItem->qty]);
            // $user->orders()->attach($cartItem->id, ['weight' => $cartItem->weight, 'quantity' => $cartItem->qty]);
        }
        
        return redirect()->route('index')->with('success', 'order successfully save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order) {
        return Inertia('Dashboard/Orders/Show', [
            'order' => $order->load('orders'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    //public function createPDF() {
        public function createPDF(Order $order) {
        //$orders = Order::orderByDesc('created_at')->with('products')->get();
        
        $order->load(['products']);
        $user = Auth::user();
        $informations = Info::find(1);
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('download/orders', compact(['order', 'user', 'informations']));
        // return $pdf->download('agrimax_orders_list'.now().'.pdf');
        return $pdf->stream('agrimax_order_'.now().'.pdf');
    }
}

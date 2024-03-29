<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

use App\Models\Category;
use App\Models\Info;
use Gloudemans\Shoppingcart\Facades\Cart;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $cart = Cart::instance('default');
        return array_merge(parent::share($request), [
            'flash' => [
                'success' => $request->session()->get('success')
            ],
            'user' => $request->user() ? [
                'id' => $request->user()->id,
                'firstname' => $request->user()->firstname,
                'lastname' => $request->user()->lastname,
                'email' => $request->user()->email,
                'role_id' => $request->user()->role->id,
                'notificationCount' => $request->user()->unreadNotifications()->count(),
                'notifications' => $request->user()->notifications()->get()->take(3)
                //'telephone' => $request->user()->telephone,
            ] : null,
            
            'informations' =>  Info::find(1),
            'categories' => Category::orderBy('name', 'asc')->get(),

            'cartItems' => $cart->content(),
            'cartcount' => $cart->count(),
            'subtotal' => $cart->subtotal(),


            // value of category and input in the searchCategory component
            // Category::select('name')->where('id', '=', $request->query()['category'])->first()->name
            'filters' => $request->query(),
        ]);
    }
}

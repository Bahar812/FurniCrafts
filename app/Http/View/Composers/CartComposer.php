<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetail;

class CartComposer
{
    public function compose(View $view)
    {
        $cartDetails = collect();
        $cartItemCount = 0;
        $cartTotal = 0;

        if (Auth::check()) {
            $cart = Cart::where('userId', Auth::user()->uuid)->first();
            if ($cart) {
                $cartDetails = CartDetail::where('cartId', $cart->uuid)->with('product')->get();
                $cartItemCount = $cartDetails->sum('qty');
                $cartTotal = $cartDetails->sum('subTotal');
            }
        }

        $view->with([
            'cartDetails' => $cartDetails,
            'cartItemCount' => $cartItemCount,
            'cartTotal' => $cartTotal,
        ]);
    }
}

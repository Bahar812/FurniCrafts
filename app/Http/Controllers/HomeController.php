<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd($this->getCartDetails());
        // $data['getCartNumber'] = $this->getCartNumber();
        // $data['getCartDetails'] = $this->getCartDetails();
        // $data['getCartTotal'] = $this->getCartTotal();
        return view('index');
    }


    // public function getCartNumber(){
    //     if (Auth::check()) {
    //         $cart = Cart::where('userId', Auth::user()->uuid)->first();
    //         if ($cart) {
    //             $cartItemCount = CartDetail::where('cartId', $cart->uuid)->sum('qty');
    //             return $cartItemCount;
    //         }
    //     }
    //     return 0;
    // }

    // public function getCartDetails()
    // {
    //     if (Auth::check()) {
    //         $cart = Cart::where('userId', Auth::user()->uuid)->first();
    //         if ($cart) {
    //             $cartDetails = CartDetail::where('cartId', $cart->uuid)->with('product')->get();
    //             return $cartDetails;
    //         }
    //     }
    //     return collect(); // Return an empty collection if no cart or user is found
    // }

    // public function getCartTotal()
    // {
    //     if (Auth::check()) {
    //         $cart = Cart::where('userId', Auth::user()->uuid)->first();
    //         return $cart;
    //     }
    //     return collect(); // Return an empty collection if no cart or user is found
    // }
}

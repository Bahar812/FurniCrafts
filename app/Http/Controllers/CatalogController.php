<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;

class CatalogController extends Controller
{
    public function loadCatalogOffice(){
        $products = Product::where('CategoryID', '3')->paginate();

        return view('product',compact('products'));
    }
    public function loadKitchen(){

        // $data['getCartNumber'] = $this->getCartNumber();
        // $data['getCartDetails'] = $this->getCartDetails();
        // $data['getCartTotal'] = $this->getCartTotal();
        $products = Product::where('CategoryID', '2')->paginate();

        return view('productKitchen',compact('products'));
    }

    public function loadLivingRoom(){

        // $data['getCartNumber'] = $this->getCartNumber();
        // $data['getCartDetails'] = $this->getCartDetails();
        // $data['getCartTotal'] = $this->getCartTotal();
        $products = Product::where('CategoryID', '1')->paginate();

        return view('productLivingRoom',compact('products'));
    }

    public function loadBedroom(){

        // $data['getCartNumber'] = $this->getCartNumber();
        // $data['getCartDetails'] = $this->getCartDetails();
        // $data['getCartTotal'] = $this->getCartTotal();
        $products = Product::where('CategoryID', '4')->paginate();

        return view('productBedroom',compact('products'));
    }

    public function productDetails($id)
    {
        // $data['getCartNumber'] = $this->getCartNumber();
        // $data['getCartDetails'] = $this->getCartDetails();
        // $data['getCartTotal'] = $this->getCartTotal();
        $product = Product::where('ItemId', $id)->first();
        $rproducts =  Product::where('ItemId','!=', $id)->inRandomOrder()->get()->take(8);
        //  dd($product); // Debugging

        if (!$product) {
            abort(404); // Produk tidak ditemukan, tampilkan halaman 404
        }

        return view('productDetail', compact('product', 'rproducts'));
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

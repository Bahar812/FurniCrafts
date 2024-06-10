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
{public function loadCatalogOffice(Request $request){
    // Ambil harga maksimum dari produk paling mahal
    $maxProductPrice = Product::where('CategoryID', '3')->max('Price');
    // dd($maxProductPrice);

    // Ambil nilai minPrice dan maxPrice dari request
    $minPrice = $request->input('minPrice');
    $maxPrice = $request->input('maxPrice');

    // Query untuk mendapatkan produk berdasarkan kategori
    $productsQuery = Product::where('CategoryID', '3');

    // Filter berdasarkan rentang harga jika disediakan
    if($minPrice && $maxPrice) {
        $productsQuery->whereBetween('Price', [$minPrice, $maxPrice]);
    }

    // Ambil produk berdasarkan query yang telah difilter dan paginasi
    $products = $productsQuery->paginate();

    // Kirimkan data produk dan harga maksimum ke view
    return view('product', compact('products', 'maxProductPrice'));
}

    public function loadKitchen(Request $request){
       // Ambil harga maksimum dari produk paling mahal
    $maxProductPrice = Product::where('CategoryID', '2')->max('Price');
    // dd($maxProductPrice);

    // Ambil nilai minPrice dan maxPrice dari request
    $minPrice = $request->input('minPrice');
    $maxPrice = $request->input('maxPrice');

    // Query untuk mendapatkan produk berdasarkan kategori
    $productsQuery = Product::where('CategoryID', '2');

    // Filter berdasarkan rentang harga jika disediakan
    if($minPrice && $maxPrice) {
        $productsQuery->whereBetween('Price', [$minPrice, $maxPrice]);
    }

    // Ambil produk berdasarkan query yang telah difilter dan paginasi
    $products = $productsQuery->paginate();

    return view('productKitchen',compact('products', 'maxProductPrice'));
    }

    public function loadLivingRoom(Request $request){
 // Ambil harga maksimum dari produk paling mahal
 $maxProductPrice = Product::where('CategoryID', '1')->max('Price');
 // dd($maxProductPrice);

 // Ambil nilai minPrice dan maxPrice dari request
 $minPrice = $request->input('minPrice');
 $maxPrice = $request->input('maxPrice');

 // Query untuk mendapatkan produk berdasarkan kategori
 $productsQuery = Product::where('CategoryID', '1');

 // Filter berdasarkan rentang harga jika disediakan
 if($minPrice && $maxPrice) {
     $productsQuery->whereBetween('Price', [$minPrice, $maxPrice]);
 }

 // Ambil produk berdasarkan query yang telah difilter dan paginasi
 $products = $productsQuery->paginate();

        return view('productLivingRoom',compact('products', 'maxProductPrice'));
    }

    public function loadBedroom(Request $request){

       // Ambil harga maksimum dari produk paling mahal
    $maxProductPrice = Product::where('CategoryID', '4')->max('Price');
    // dd($maxProductPrice);

    // Ambil nilai minPrice dan maxPrice dari request
    $minPrice = $request->input('minPrice');
    $maxPrice = $request->input('maxPrice');

    // Query untuk mendapatkan produk berdasarkan kategori
    $productsQuery = Product::where('CategoryID', '4');

    // Filter berdasarkan rentang harga jika disediakan
    if($minPrice && $maxPrice) {
        $productsQuery->whereBetween('Price', [$minPrice, $maxPrice]);
    }

    // Ambil produk berdasarkan query yang telah difilter dan paginasi
    $products = $productsQuery->paginate();
        return view('productBedroom',compact('products', 'maxProductPrice'));
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

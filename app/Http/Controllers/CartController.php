<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    // private function updateGrandTotal($cartId)
    // {
    //     $cart = Cart::withSum('cartDetails:subTotal')->find($cartId);
    //     $cart->total = $cart->cartDetails_sum_subTotal;
    //     $cart->save();
    // }
    public function addToCart(Request $request)
    {

    $user = Auth::user();


    if (!$user) {
        return redirect('/login')->with('error', 'You need to login first.');
    }

    $productId = $request->input('productId');
    $quantity = $request->input('quantity', 1); // Default quantity is 1

    $product = Product::findOrFail($productId);

    $cart = Cart::firstOrCreate(
        ['userId' => $user->uuid],
        [
            'uuid' => (string) Str::uuid(),
            'tanggal' => now()->toDateString(),
            'waktu' => now()->toTimeString(),
            'total' => 0
        ]
    );

    $cartDetail = CartDetail::firstOrCreate(
        ['cartId' => $cart->uuid, 'productId' => $productId],
        [
            'uuid' => (string) Str::uuid(),
            'qty' => $quantity,
            'subTotal' => $product->Price * $quantity
        ]
    );

    if (!$cartDetail->wasRecentlyCreated) {
        $cartDetail->qty += $quantity;
        $cartDetail->subTotal = $product->Price * $cartDetail->qty;
        $cartDetail->save();
    }

    $cart->total = $cart->cartDetails()->sum('subTotal');
    $cart->save();

    return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        // $data['getCartNumber'] = $this->getCartNumber();
        // $data['getCartDetails'] = $this->getCartDetails();
        // $data['getCartTotal'] = $this->getCartTotal();
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'You need to login first.');
        }

        $cart = Cart::with('cartDetails.product')->where('userId', $user->uuid)->first();

        return view('cart', compact('cart'));
    }

    public function updateQuantity(Request $request)
{
    $cartDetailId = $request->input('cartDetailId');
    $change = $request->input('change');

    $cartDetail = CartDetail::findOrFail($cartDetailId);
    $newQty = $cartDetail->qty + $change;

    if ($newQty < 1) {
        return response()->json(['success' => false, 'message' => 'Quantity cannot be less than 1']);
    }

    $cartDetail->qty = $newQty;
    $cartDetail->subTotal = $newQty * $cartDetail->product->Price;
    $cartDetail->save();

    // Update cart total
    $cartDetail->cart->total = $cartDetail->cart->cartDetails()->sum('subTotal');
    $cartDetail->cart->save();

    return response()->json(['success' => true]);
}
public function deleteItem(Request $request)
{
    // $cartDetailId = $request->input('cartDetailId');

    // // Hapus item keranjang berdasarkan id
    // $deleted = CartDetail::where('uuid', $cartDetailId)->delete();

    // if($deleted) {
    //     return response()->json(['success' => true, 'message' => 'Item has been deleted successfully.']);
    // } else {
    //     return response()->json(['success' => false, 'message' => 'Failed to delete item.']);
    // }

    $cartDetailId = $request->input('cartDetailId');

    // Temukan detail keranjang yang sesuai
    $cartDetail = CartDetail::where('uuid', $cartDetailId)->first();

    if (!$cartDetail) {
        return response()->json(['success' => false, 'message' => 'Item not found.']);
    }

    // Hapus item keranjang berdasarkan id
    $deleted = $cartDetail->delete();

    if($deleted) {
        // Update cart total
        $cartDetail->cart->total = $cartDetail->cart->cartDetails()->sum('subTotal');
        $cartDetail->cart->save();

        return response()->json(['success' => true, 'message' => 'Item has been deleted successfully.']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to delete item.']);
    }
}

public function getCartSummary()
{
    $user = Auth::user();

    if ($user) {
        $cart = Cart::with('cartDetails.product')->where('userId', $user->uuid)->first();

        return response()->json(['cart' => $cart]);
    }

    return response()->json(['cart' => null]);
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

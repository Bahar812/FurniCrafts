<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        // Mendapatkan ID user yang sedang login
        $userId = Auth::id();

        // Mengambil produk yang ada di wishlist user yang sedang login
        $wishlist = Wishlist::where('user_id', $userId)->with('product')->paginate(10);
        // dd($wishlist);

        // Kirim data produk ke view
        return view('wishlist', compact('wishlist'));
    }

    public function store(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('fail', 'You must be logged in to add items to your wishlist');
        }
        $user = Auth::user();

    // Atau jika ingin mengambil berdasarkan UUID
    // $userByUuid =
        $userId = User::where('uuid', $user->uuid)->first()->uuid;

        // Cek apakah produk sudah ada di wishlist
        $exists = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('fail', 'Product is already in your wishlist');
        }

        // Tambahkan produk ke wishlist
        // dd($productId)
        $wishlist = new Wishlist();
        $wishlist->user_id = $userId;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return redirect()->back()->with('success', 'Product added to wishlist');
    }

    public function destroy($id)
    {
        $userId = Auth::id();

        // Hapus produk dari wishlist
        $wishlist = Wishlist::where('user_id', $userId)->where('id', $id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist');
        }

        return redirect()->back()->with('fail', 'Product not found in your wishlist');
    }
}

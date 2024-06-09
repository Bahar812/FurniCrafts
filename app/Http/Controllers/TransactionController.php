<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\CartDetail;
use App\Models\Shipping;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
class TransactionController extends Controller
{
    public function store(Request $request, Transaction $transaction)
    {
        $user = Auth::user();
          // Mengambil nama pengguna
        $userName = $user->name;
        $userEmail = $user->email;
        $shipping = Shipping::where('user_id', auth()->id())->first();


        // Validasi input jika diperlukan
        // $request->validate([
        //     'selectedCourier' => 'required|string',
        //     'total' => 'required|numeric',
        //     'shippingCost' => 'required|numeric',
        // ]);

        // Dapatkan data dari request
        $selectedCourier = strtoupper($request->input('selectedCourier'));
        $total = $request->input('total'); // Pastikan total diterima dari view atau dihitung ulang
        $shippingCost = $request->input('shippingCost'); // Pastikan shippingCost diterima dari view atau dihitung ulang
        $grandTotal = $total + $shippingCost;
        $cart = Cart::where('userId', auth()->id())->first();



        $notification = $request->input();

        // Log untuk memastikan bahwa kita menerima notifikasi yang benar
        Log::info('Midtrans Notification:', $notification);

        // Pastikan kunci 'transaction_status' dan 'order_id' ada dalam notifikasi
        if (isset($notification['transaction_status']) && isset($notification['order_id'])) {
            $transactionStatus = $notification['transaction_status'];
            $orderId = $notification['order_id'];

            // Cari transaksi berdasarkan order_id
            $transaction = Transaction::where('uuid', $orderId)->first();

            if (!$transaction) {
                return response()->json(['status' => 'transaction not found'], 404);
            }

            // Update status transaksi berdasarkan status dari Midtrans
            if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                $transaction->statusPembayaran = 'Paid';
                $transaction->tipePembayaran = $notification['payment_type'];
            } elseif ($transactionStatus == 'pending') {
                $transaction->statusPembayaran = 'Pending';
            } elseif ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
                $transaction->statusPembayaran = 'Failed';
            }

            $transaction->save();

            return response()->json(['status' => 'success'], 200);
        } else {
            // Log jika kunci tidak ditemukan
            Log::error('Invalid Midtrans Notification:', $notification);
            return response()->json(['status' => 'invalid notification'], 400);
        }
    }

    public function success(Transaction $transaction){
        $transaction->statusPembayaran = 'success';
        $transaction->tipePembayaran = 'qris';
        $transaction->save();


          // Clear the cart for the current user
        $user = Auth::user();
          if ($user) {
              $cart = Cart::where('userId', $user->uuid)->first();
              if ($cart) {
                  CartDetail::where('cartId', $cart->uuid)->delete();
                  $cart->delete();
              }
          }

          return view('success');
    }
}

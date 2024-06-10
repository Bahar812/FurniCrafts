<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\User;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Transaction;
use App\Models\DetailTransaction;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $response_province = Http::withOptions([
            'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
        ])->withHeaders([
            'key' => '0f7236cf079f3f9782714c0a9d6324c5',
        ])->get('https://api.rajaongkir.com/starter/province');

        $response_city = Http::withOptions([
            'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
        ])->withHeaders([
            'key' => '0f7236cf079f3f9782714c0a9d6324c5',
        ])->get('https://api.rajaongkir.com/starter/city');

        // dd($response_city->json());
        $provinsi = $response_province['rajaongkir']['results'];
        $cities = $response_city['rajaongkir']['results'];



        // Ambil data cart
        $cart = Cart::where('userId', auth()->id())->first();

        // Ambil data cart detail
        $cartDetails = CartDetail::where('cartId', $cart->uuid)->get();
  // Ambil total dari kolom total di tabel cart
  $total = $cart->total;

  return view('checkout', compact('cart', 'cartDetails', 'total', 'provinsi', 'cities'));
    }

    public function processCheckout(Request $request)
    {
        // dd($request);
        $user = Auth::user();


        if (!$user) {
            return redirect('/login')->with('error', 'You need to login first.');
        }

        // Validasi data pengiriman
        $request->validate([
            'phone' => 'required|string|regex:/^[0-9]+$/',
        ]);

        // $response_province = Http::withOptions([
        //     'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
        // ])->withHeaders([
        //     'key' => '0f7236cf079f3f9782714c0a9d6324c5',
        // ])->get('https://api.rajaongkir.com/starter/province');

        // $response_city = Http::withOptions([
        //     'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
        // ])->withHeaders([
        //     'key' => '0f7236cf079f3f9782714c0a9d6324c5',
        // ])->get('https://api.rajaongkir.com/starter/city');

    //     $response_cost = Http::withOptions([
    //         'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
    //     ])->withHeaders([
    //         'key' => '0f7236cf079f3f9782714c0a9d6324c5',
    //     ])->post('https://api.rajaongkir.com/starter/cost',[
    //         'origin' => '501',
    //         'destination' => '114',
    //         'weight' => '10800',
    //         'courier' => 'jne',
    //     ]
    // );

    // dd($response_cost->json());


        // Simpan data pengiriman ke dalam database
        $shipping = new Shipping();
        $shipping->uuid = (string) Str::uuid();
        $shipping->user_id = $user->uuid;
        $shipping->alamat = $request->address;
        $shipping->kota = $request->state;
        $shipping->provinsi = $request->province;
        $shipping->negara = 'Indonesia';
        $shipping->kode_pos = $request->zip;
        $shipping->nomor_telepon = $request->phone;
        $shipping->status = 'pending';

        $shipping->save();

        return redirect('/checkoutshipping')->with('success', 'Shipping information saved successfully.');
    }

    public function showCheckoutShipping()
{
    // Mengambil data shipping dari pengguna yang sedang login
    $shipping = Shipping::where('user_id', Auth::id())->latest()->first();
    // Ambil pengguna yang sedang masuk
    $user = Auth::user();

    // Atau jika ingin mengambil berdasarkan UUID
    $userByUuid = User::where('uuid', $user->uuid)->first();

    // Lakukan panggilan API untuk mendapatkan ongkos kirim
    $couriers = ['jne', 'pos', 'tiki']; // contoh kurir yang tersedia
    // Ambil data cart
    $cart = Cart::where('userId', auth()->id())->first();

    // Ambil data cart detail
    $cartDetails = CartDetail::where('cartId', $cart->uuid)->get();
// Ambil total dari kolom total di tabel cart
$total = $cart->total;

    return view('checkoutshipping', compact('shipping', 'cartDetails','total', 'couriers', 'userByUuid'));
}

public function calculateShippingCost(Request $request)
{

    $shipping = Shipping::where('user_id', Auth::id())->latest()->first();
    // Ambil pengguna yang sedang masuk
    $user = Auth::user();

    $user = Auth::user();
    // Mengambil nama pengguna
  $userName = $user->name;
  $userEmail = $user->email;
    // Atau jika ingin mengambil berdasarkan UUID
    $userByUuid = User::where('uuid', $user->uuid)->first();

    // Lakukan panggilan API untuk mendapatkan ongkos kirim
    $couriers = ['jne', 'pos', 'tiki']; // contoh kurir yang tersedia
    // Ambil data cart
    $cart = Cart::where('userId', auth()->id())->first();

    // Ambil data cart detail
    $cartDetails = CartDetail::where('cartId', $cart->uuid)->get();
// Ambil total dari kolom total di tabel cart
    $total = $cart->total;
    $selectedCourier = $request->input('selectedCourier');
    $user = Auth::user();
    $shipping = Shipping::where('user_id', auth()->id())->first();
    // dd($shipping);
    $userByUuid = User::where('uuid', $user->uuid)->first();

    $response_cost = Http::withOptions([
        'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
    ])->withHeaders([
        'key' => '0f7236cf079f3f9782714c0a9d6324c5',
    ])->post('https://api.rajaongkir.com/starter/cost',[
        'origin' => '444', // ID asal
        'destination' => $shipping->kota,
        'weight' => '10000',
        'courier' => $selectedCourier,
    ]);
    $costs = $response_cost['rajaongkir']['results'][0]['costs'];
    $lastCost = end($costs);
    $shippingCostValue = $lastCost['cost'][0]['value'];
// Pastikan shippingCost diterima dari view atau dihitung ulang
    $grandTotal = $total + $shippingCostValue;
    $transaction = new Transaction();
    $transaction->uuid = Str::uuid();
    $transaction->tanggal = now()->toDateString();
    $transaction->waktu = now()->toTimeString();
    $transaction->statusPembayaran = 'Pending'; // atau sesuai kebutuhan
    $transaction->total = $grandTotal;
    $transaction->tipePembayaran = 'Transfer'; // atau sesuai kebutuhan
    $transaction->shippingId = $shipping->uuid;
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $grandTotal,
                ),
                $customer_details = array(
                    'first_name'       => $userName,
                    'email'            => $userEmail,
                )
            );
            $response_province = Http::withOptions([
                'verify' => 'C:\\xampp\\apache\\bin\\cacert.pem'
            ])->withHeaders([
                'key' => '0f7236cf079f3f9782714c0a9d6324c5',
            ])->get('https://api.rajaongkir.com/starter/province');


         // Tentukan lokasi absolut ke file sertifikat

// Dapatkan Snap Token
$snapToken = \Midtrans\Snap::getSnapToken($params);
            // Store Snap Token in session
            session(['snapToken' => $snapToken]);
            // Store Snap Token in cache
            cache(['snapToken' => $snapToken], now()->addHours(1));
            $transaction->save();
            $cartDetails = CartDetail::where('cartId', $cart->uuid)->get();
            foreach ($cartDetails as $cartDetail) {
                $detailTransaction = new DetailTransaction();
                $detailTransaction->uuid = Str::uuid();
                $detailTransaction->productId = $cartDetail->productId;
                $detailTransaction->transaksiId = $transaction->uuid;
                $detailTransaction->qty = $cartDetail->qty;
                $detailTransaction->subTotal = $cartDetail->subTotal;
                $detailTransaction->save();
            }




    // dd($costs);

    return view('checkoutpayment', compact('shipping','costs', 'cartDetails','total', 'couriers', 'userByUuid','selectedCourier', 'transaction'));
}






}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function loadAllShipping(){
        $all_shipping = Shipping::with('user')->orderBy('status', 'desc')->paginate();

        return  view('admin.pageShipping',  compact('all_shipping'));
    }

    public function updateStatus($uuid)
    {
        $shipping = Shipping::where('uuid', $uuid)->first();
        if ($shipping) {
            $shipping->status = 'Berhasil dikirim';
            $shipping->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Shipping;

class HistoryController extends Controller
{
    public function loadAllHistory(){
        $userId = Auth::id();

        // Ambil semua transaksi user beserta detailnya
        $transactions = Transaction::with('detailTransactions', 'shipping')
            ->whereHas('shipping', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

            if ($transactions->isEmpty()) {
                $message = "Anda belum melakukan transaksi.";
                return view('historytransaction', compact('message'));
            }

            return view('historytransaction', compact('transactions'));

    }
}

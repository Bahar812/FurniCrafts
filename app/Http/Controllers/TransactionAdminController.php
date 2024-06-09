<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionAdminController extends Controller
{
    public function loadAllTransaction(){
        $all_transaction = Transaction::orderBy('created_at', 'desc')->get();
        // dd($all_transaction);
        return view('admin.pageTransaction', compact('all_transaction'));
    }
}

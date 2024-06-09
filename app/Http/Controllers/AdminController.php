<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;

class AdminController extends Controller
{
    function index(){

        // Menghitung jumlah total produk
        $totalProduk = Product::count();

        // Menghitung jumlah total transaksi bulan ini
        $totalTransaksiBulanIni = Transaction::whereMonth('created_at', Carbon::now()->month)->count();

        // Menghitung jumlah semua total pendapatan
        $totalPendapatan = Transaction::where('statusPembayaran', 'success')->sum('total');

        // // Menghitung total pendapatan bulan ini
        // $totalPendapatanBulanIni = Transaction::where('statusPembayaran', 'Paid')
        //                                       ->whereMonth('created_at', Carbon::now()->month)
        //                                       ->sum('total');


    // Mendapatkan ringkasan penjualan
    $ringkasanPenjualan = Transaction::where('statusPembayaran', 'success')->orderBy('created_at', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('totalProduk', 'totalTransaksiBulanIni', 'totalPendapatan','ringkasanPenjualan'));
    }
    function Manager(){
        return view('admin.dashboard');
    }
}

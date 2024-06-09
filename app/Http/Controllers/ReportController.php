<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class ReportController extends Controller
{
    public function loadAllReport()
    {
        // Fetch daily revenue data
        $startDate = Carbon::now()->subMonth();
        $endDate = Carbon::now();

        $dailyRevenue = Transaction::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Extract dates and revenues into separate arrays
        $dates = $dailyRevenue->pluck('date')->toArray();
        $revenues = $dailyRevenue->pluck('revenue')->toArray();
     // Fetch top 5 best-selling products
     $topProducts = DetailTransaction::select('productId', DB::raw('COUNT(*) as qty_sold'))
     ->groupBy('productId')
     ->orderByDesc('qty_sold')
     ->take(5)
     ->get();

 // Get product details for top 5 products
 $productData = [];
 foreach ($topProducts as $topProduct) {
     $product = \App\Models\Product::findOrFail($topProduct->productId);
     $productData[] = [
         'Nama_Product' => $product->Nama_Product,
         'qty_sold' => $topProduct->qty_sold
     ];
 }
 $categoryData = Category::select('Category_Name', DB::raw('COUNT(*) as qty_sold'))
 ->join('product', 'category.id', '=', 'product.CategoryID')
 ->join('detail_transaction', 'product.ItemId', '=', 'detail_transaction.productId')
 ->groupBy('category.id', 'Category_Name') // Menyertakan Category_Name dalam GROUP BY
 ->orderByDesc('qty_sold')
 ->take(5)
 ->get();

 $userRegistrations = User::whereBetween('created_at', [$startDate, $endDate])
 ->selectRaw('MONTH(created_at) as month, COUNT(*) as user_count')
 ->groupBy('month')
 ->orderBy('month')
 ->get();

// Extract months and user counts into separate arrays
$months = $userRegistrations->pluck('month')->toArray();
$userCounts = $userRegistrations->pluck('user_count')->toArray();

//  dd($categoryData);

return view('admin.pageReport', compact('dates', 'revenues', 'productData', 'categoryData', 'months', 'userCounts'));
    }
}

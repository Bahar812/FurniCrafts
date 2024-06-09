<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TransactionAdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;

// Route::get('/',  [HomeController::class, 'index'])->name('login');


Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/manager', [AdminController::class, 'manager'])->middleware(['auth', 'manager']);





// Route::get('/checkoutshipping', function () {
//     return view('checkoutShipping');
// });


Route::get('/', function () {
    return view('index');
})->name('login');

// Route::get('/forgot', function () {
//     return view('forgot');
// });

Route::get('/logout', [Login::class, 'logout']);
Route::get('/register', [Register::class, 'index']);
Route::get('/login', [Login::class, 'index']);
Route::post('/register', [Register::class, 'store']);
Route::post('/login', [Login::class, 'store']);
Route::post('/logout', [Login::class, 'logout'])->name('logout');
Route::get('/forgot', [Login::class, 'showForgot']);
Route::post('/forgot', [Login::class, 'forgotPassword']);
Route::get('/reset-password/{token}/{email}', function ($token, $email) {
    return view('restart_password', ['token' => $token, 'email' => $email,]);
})->name('password.reset');
Route::post('/reset-password', [Login::class, 'resetPassword'])->name('password.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/users', [UserController::class, 'loadAllUsers']);
Route::get('/add/user', [UserController::class, 'loadAddUser']);
Route::post('/add/user', [UserController::class, 'addUser']);
Route::get('/delete/{id}', [UserController::class, 'deleteUser']);
Route::get('/edit/{id}', [UserController::class, 'loadEditForm']);
Route::post('/edit/user', [UserController::class, 'EditUser'])->name('EditUser');

Route::get('/category', [CategoryController::class, 'loadAllCategory']);
Route::get('/add/category', [CategoryController::class, 'loadAddCategory']);
Route::post('/add/category', [CategoryController::class, 'addCategory']);
Route::get('/delete/category/{id}', [CategoryController::class, 'deleteCategory']);
Route::get('/edit/category/{id}', [CategoryController::class, 'loadEditForm']);
Route::post('/edit/category', [CategoryController::class, 'EditCategory'])->name('EditCategory');

Route::get('/products', [ProductController::class, 'loadAllProduct'])->name('LoadProduct');
Route::get('/add/product', [ProductController::class, 'loadAddProduct']);
Route::post('/add/product', [ProductController::class, 'addProduct'])->name('addProduct');
Route::get('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/editProduct/{id}', [ProductController::class, 'loadEditForm']);
Route::post('/edit/product', [ProductController::class, 'EditProduct'])->name('updateProduct');

Route::get('/productRuangKerja', [CatalogController::class, 'loadCatalogOffice']);
Route::get('/productRuangDapur', [CatalogController::class, 'loadKitchen']);
Route::get('/productRuangTamu', [CatalogController::class, 'loadLivingRoom']);
Route::get('/productRuangTidur', [CatalogController::class, 'loadBedroom']);

Route::get('/productRuangDapur/{id}', [CatalogController::class, 'productDetails']);
Route::get('/productRuangKerja/{id}', [CatalogController::class, 'productDetails']);
Route::get('/productRuangTamu/{id}', [CatalogController::class, 'productDetails']);
Route::get('/productRuangTidur/{id}', [CatalogController::class, 'productDetails']);

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity']);
Route::post('/cart/delete-item', [CartController::class,'deleteItem'])->name('cart.delete-item');
Route::get('/cart-summary', [CartController::class, 'getCartSummary'])->name('cart.summary');

Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::get('/checkoutshipping', [CheckoutController::class, 'showCheckoutShipping']);
Route::post('/checkoutshipping', [CheckoutController::class, 'calculateShippingCost']);
Route::get('/checkoutshipping/process', [CheckoutController::class, 'calculateShippingCost']);

Route::get('/pembayaran/{transaction}', [TransactionController::class, 'success'])->name('pembayaran');

Route::get('/transaction', [TransactionAdminController::class, 'loadAllTransaction']);

Route::get('/shipping', [ShippingController::class, 'loadAllShipping']);
Route::post('/update/shipping/{uuid}', [ShippingController::class, 'updateStatus'])->name('shipping.updateStatus');

Route::get('/report', [ReportController::class, 'loadAllReport']);
// Route::get('/checkoutpayment', function () {
//     return view('checkoutPayment');
// });
// Route::post('/test-request', [CheckoutController::class, 'handleRequest']);

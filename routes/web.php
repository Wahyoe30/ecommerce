<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyFavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderDetailController;
use App\Models\Myfavorite;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'home']);
// Route untuk fitur CRUD kategori
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::get('/categories/{id_category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{id_category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::get('/categories/{id_category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::delete('/categories/{id_category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
// Route::resource('favorites', MyFavoriteController::class);
// Route::resource('favorites', MyfavoriteController::class);
Route::get('/favorites', [MyFavoriteController::class, 'index'])->name('favorites.index');
Route::resource('orders', OrderController::class);
Route::resource('payments', PaymentController::class);
// Route::resource('orderdetails', OrderDetailController::class);
Route::get('/orderdetails/{id}/dokumen', [OrderDetailController::class, 'dokumen'])->name('orderdetails.dokumen');
// Route::resource('home', HomeController::class);

// Route untuk halaman beranda
Route::get('/home', [HomeController::class, 'index'])->name('home');

// // Route untuk fitur CRUD produk
// Route::resource('produk', ProdukController::class)->middleware('auth');

// // Route untuk fitur CRUD user
// Route::resource('user', UserController::class)->middleware('auth');

// // Route untuk fitur CRUD pesanan
// Route::resource('pesanan', PesananController::class)->middleware('auth');

// // Route untuk fitur CRUD order
// Route::resource('orders', OrderController::class)->middleware('auth');

// // Route untuk fitur CRUD order details
// Route::resource('order-details', OrderDetailController::class)->only(['store', 'update', 'destroy'])->middleware('auth');

// Route untuk generate PDF
// Route::get('orders/{id}/pdf', [OrderController::class, 'generatePDF'])->name('orders.generatePDF')->middleware('auth');


// Route::resource('favorits', FavoritController::class);



// Route::get('/transactions/pemasukan', [TransactionController::class, 'pemasukan'])->name('transactions.pemasukan');
// Route::get('/transactions/pengeluaran', [TransactionController::class, 'pengeluaran'])->name('transactions.pengeluaran');
// Route::resource('transactions', TransactionController::class);



// Route untuk login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// // Route untuk register
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

// Route untuk logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

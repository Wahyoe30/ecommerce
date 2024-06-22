<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Myfavorite;
use App\Models\Chart;
use App\Models\OrderDetail;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Products::all();
        $categories = Category::all();
        $orders = Order::all();
        $payments = Payment::all();
        $myfavorites = Myfavorite::all();
        $charts = Chart::all();
        $orderDetails = OrderDetail::all();

        return view('admin.dashboard', compact('users', 'products', 'categories', 'orders', 'payments', 'myfavorites', 'charts', 'orderDetails'));
    }
}

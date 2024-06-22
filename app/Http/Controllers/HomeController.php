<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $totalcategory = Category::all()->count();
        $totalproduct = Products::all()->count();
        $totaluser = User::all()->count();
        $totalorder = Order::all()->count();

        // $produk = Produk::count();

        return view('home', compact('totalcategory','totalproduct','totaluser','totalorder'));
    }

}

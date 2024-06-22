<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //
    public function dokumen($id)
    {
        // Ambil OrderDetail berdasarkan ID
        $dokumen = OrderDetail::FindOrFail($id);

        if (!$dokumen) {
            return redirect()->route('orders.index')->with('error', 'Order detail not found');
        }

        // Ambil Order yang berhubungan dengan OrderDetail
        $order = $dokumen->order;

        // Ambil User yang berhubungan dengan Order
        $user = $order->user;

        // Ambil Products yang berhubungan dengan Order
        // $product = $order->product; // Asumsi Order memiliki relasi `products`

        return view('orderdetails.dokumen', compact('dokumen', 'order', 'user'));
        // dd($order->product->name);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get(); // Menggunakan eager loading untuk memuat relasi user
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $getMaxId = Order::whereRaw('id = (select max(`id`) from orders)')->first();
        return view('orders.create', compact('users', 'getMaxId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|max:50',
        ]);

        Order::create([
            'id_user' => $request->id_user,
            'total_amount' => $request->total_amount,
            'status' => $request->status
        ]);
        OrderDetail::create([
            'id_order' => $request->id,
            'quantity' => $request->quantity,
            'price'    => $request->price
        ]);

        // dd($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        // $order->load('user');
        // $orderdetail = OrderDetail::all();
        // return view('orders.show', compact('order','orderdetail'));
        $order = Order::with('orderdetail', 'user')->find($id);

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Order not found');
        }

        return view('orders.show', compact('order'));
        // dd($orderdetail);
    }

    public function edit(Order $order)
    {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'id' => 'required|integer',
            'id_user' => 'required|integer',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|in:Pending,Processing,Delivered,Cancelled|max:50',
        ]);

        // $order->update($request->all());
        $order->id = $request->id;
        $order->id_user = $request->id_user;
        $order->total_amount = $request->total_amount;
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
    // public function index()
    // {
    //     // $orders = Order::with('user')->get();
    //     $users = User::all();
    //     $orders = Order::all();
    //     return view('orders.index', compact('orders','users' ));
    // }

    // public function create()
    // {
    //     $users = User::all();
    //     $order = Order::all();
    //     return view('orders.create', compact('users','order'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_user' => 'required|integer',
    //         'total_amount' => 'required|numeric',
    //         'status' => 'required|string|max:50',
    //     ]);

    //     Order::create($request->all());

    //     return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    // }

    // public function show($id)
    // {
    //     // $order->load('user');
    //     // $orderdetail = OrderDetail::all();
    //     // return view('orders.show', compact('order','orderdetail'));
    //     $order = Order::with('orderdetail', 'user')->find($id);

    //     if (!$order) {
    //         return redirect()->route('orders.index')->with('error', 'Order not found');
    //     }

    //     return view('orders.show', compact('order'));
    // }

    // public function edit(Order $order)
    // {
    //     $users = User::all();
    //     return view('orders.edit', compact('order', 'users'));
    // }

    // public function update(Request $request, Order $order)
    // {
    //     $request->validate([
    //         'id' => 'required|integer',
    //         'id_user' => 'required|integer',
    //         'total_amount' => 'required|numeric',
    //         'status' => 'required|string|in:Pending,Processing,Delivered,Cancelled|max:50',
    //     ]);

    //     // $order->update($request->all());
    //     $order->id = $request->id;
    //     $order->id_user = $request->id_user;
    //     $order->total_amount = $request->total_amount;
    //     $order->status = $request->status;
    //     $order->save();

    //     return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    // }

    // public function destroy(Order $order)
    // {
    //     $order->delete();

    //     return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    // }
}

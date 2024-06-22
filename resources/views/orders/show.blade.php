@extends('layouts.app')

@section('title', 'Detail Order')
@section('orders', 'active')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Order Details</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>Id Orderan:</strong> {{ $order->id }}</p>
                        <p><strong>Nama Pemesan:</strong> {{ $order->user->fullname }}</p>
                        <p><strong>Quantity:</strong> {{ $order->orderdetail->quantity }}</p>
                        <p><strong>Jumlah:</strong> {{ $order->orderdetail->price }}</p>
                        <a href="{{ route('orderdetails.dokumen', $order->orderdetail->id) }}"
                            class="btn btn-primary">Print</a>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali ke Daftar Pesanan</a>
            </div>
        </div>
    </div>
@endsection

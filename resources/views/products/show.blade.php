@extends('layouts.app')

@section('title', 'Detail Produk')
@section('products', 'active')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Detail Produk</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/images/' . $product->foto) }}" alt="{{ $product->name }}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <p>{{ $product->description }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p><strong>Stok:</strong> {{ $product->stock }}</p>
                        <p><strong>Kategori:</strong> {{ $product->category->name }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
            </div>
        </div>
    </div>
@endsection

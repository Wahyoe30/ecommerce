@extends('layouts.app')

@section('title', 'Favorites Page')
@section('favorites', 'active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Daftar Favorit</h2>

                        @if ($mostFavoritedProduct)
                            <div class="alert alert-info d-flex align-items-center">
                                <div class="mr-3">
                                    <img src="{{ asset('images/' . $mostFavoritedProduct->foto) }}" class="img-thumbnail"
                                        style="width: 100px; height: auto;">
                                </div>
                                <div>
                                    <strong>Produk Paling Favorit:</strong> {{ $mostFavoritedProduct->name }}
                                    ({{ $mostFavoritedProduct->favorites_count }} favorit)
                                </div>
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Gambar</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($favorites as $index => $f)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $f->product->name }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $f->product->foto) }}" class="img-thumbnail"
                                                style="width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $f->user->fullname }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table-responsive {
            max-height: 300px;
            overflow-y: auto;
        }

        .img-thumbnail {
            max-width: 100px;
            height: auto;
        }
    </style>
@endpush

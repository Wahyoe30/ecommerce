@extends('layouts.app')

@section('title', 'Products Page')
@section('products', 'active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Produk</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('products.index') }}"><i
                    class="fas fa-caret-left"></i> Back</a>
        </div>
    </div>

    <!-- Alert -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Produk</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukan Nama Produk" value="{{ old('name', $product->name) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Deskripsi Produk</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="description" placeholder="Masukan Deskripsi Produk">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Harga Produk</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="price"
                                        placeholder="Masukan Harga Produk" value="{{ old('price', $product->price) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Stok Produk</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="stock" placeholder="Masukan Stok Produk">{{ old('stock', $product->stock) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Kategori</label>
                                <div class="col-12">
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="foto">Gambar Produk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Pilih Gambar Produk</label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="foto" class="control-label">Gambar Produk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">
                                    @if ($product->foto)
                                        {{ $product->foto }} <!-- Menampilkan nama file jika sudah ada foto -->
                                    @else
                                        Pilih Gambar Produk
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-edit"></i>
                                        Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <script>
        // Script untuk menampilkan nama file yang dipilih pada input file
        $(document).ready(function() {
            $('#foto').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName);
            });
        });
    </script>
@endpush

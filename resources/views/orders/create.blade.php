@extends('layouts.app')

@section('title', 'Orders Page')
@section('orders', 'active')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Pesanan</h1>
            <div class="pull-right">
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('orders.index') }}"><i
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
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{!! $getMaxId->id + 1 !!}">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">User</label>
                                    <select name="id_user" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Total Amount</label>
                                    <input type="number" name="total_amount" class="form-control" id="total_amount"
                                        value="{{ old('total_amount') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" id="quantity"
                                        onchange="total()" value="{{ old('quantity') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Total Price</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                        value="{{ old('price') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="Processed">Processed</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i>
                                            Simpan Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <script>
        function total() {
            var totalAmount = document.getElementById('total_amount').value;
            var quantity = document.getElementById('quantity').value;

            const jumlah = (totalAmount * quantity);
            document.getElementById('price').value = jumlah;
        }
    </script>
@endpush

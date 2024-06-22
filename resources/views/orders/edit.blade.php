@extends('layouts.app')

@section('title', 'Order Page')
@section('orders', 'active')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Pesanan</h1>
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
                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Id Order</label>
                                    <div class="col-12">
                                        <input type="string" name="id" class="form-control"
                                            value="{{ old('id', $order->id) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">User</label>
                                    <select name="id_user" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $order->id_user ? 'selected' : '' }}>
                                                {{ $user->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Total Amount</label>
                                    <div class="col-12">
                                        <input type="text" name="total_amount" class="form-control"
                                            value="{{ old('total_amount', $order->total_amount) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="Processed" {{ $order->status == 'Processed' ? 'selected' : '' }}>
                                            Processed
                                        </option>
                                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                            Delivered</option>
                                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
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

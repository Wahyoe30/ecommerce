@extends('layouts.app')

@section('title', 'Payments Page')
@section('payments', 'active')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Payment</h1>
            <div class="pull-right">
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('payments.index') }}"><i
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
                        <form action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Order ID</label>
                                    <select name="id_order" class="form-control">
                                        @foreach ($orders as $o)
                                            <option value="{{ $o->id }}">{{ $o->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Amount</label>
                                    {{-- <select name="total_amount" class="form-control">
                                        @foreach ($orders as $o)
                                            <option value="{{ $o->total_amount }}">{{ $o->total_amount }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Method</label>
                                    <input type="text" name="method" class="form-control" value="{{ old('method') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Processed">Processed</option>
                                        <option value="Completed">Completed</option>
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

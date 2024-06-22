@extends('layouts.app')

@section('title', 'Category Page')
@section('categories', 'active')

@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Kategori</h1>
            <div class="pull-right">
                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('categories.index') }}"><i
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
                        <form action="{{ route('categories.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-12 control-label">Nama Kategori</label>
                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Masukan Nama Kategori" value="{{ old('name', $category->name) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-12 control-label">Deskripsi Kategori</label>
                                        <div class="col-12">
                                            <textarea class="form-control" name="description" placeholder="Masukan Deskripsi Kategori">{{ old('description', $category->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-primary btn-block"><i
                                                    class="fas fa-edit"></i>
                                                Ubah Kategori</button>
                                        </div>
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

@extends('layouts.frontend')
@section('title')
    Category
@endsection
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Semua Kategori</h4>
                    <div class="row">
                    @foreach ($category as $cate)
                    <div class="col-md-3 mb-3">
                        <a href="{{ url('lihat-kategori/'.$cate->slug) }}" class="text-dark text-decoration-none">
                        <div class="card border-0">
                        <img src="{{ asset('asset/upload/kategori/'.$cate->image) }}" alt="category">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cate->nama }}</h5>
                            <p>
                                {{ $cate->deskripsi }}
                            </p>
                        </div>
                    </div>
                </a>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@extends('layouts.frontend')
@section('title')
    {{ $category->nama }}
@endsection
@section('content')
<div class="py-4 mb-4 border-0 b">
        <div class="container">
            <h4 class="mb-0 text-decoration-none text-dark">
                <a href="{{ url('category') }}" class="text-decoration-none text-dark">Kategori</a>/
                <a href="{{ url('lihat-kategori/'.$category->nama) }}" class="text-decoration-none text-dark">{{ $category->nama }}</a>
            </h4>
        </div>
    </div>
     <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->nama }}</h2>
                      @foreach ($produk as $product)
                        <div class="col-md-3 mb-3">
                    <div class="card border-0">
                        <a href="{{ url('lihat-kategori/'.$category->slug.'/'.$product->slug) }}">
                        
                        <img src="{{ asset('asset/upload/produk/'.$product->image) }}" class="card-img-top" alt="Produk">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                             <span class="float-start">Rp. {{ $product->harga_jual }}</span>
                            <span class="float-end text-danger"><s>Rp. {{ $product->original_harga }}</s></span>
                        </div>
                        </a>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
@extends('layouts.frontend')
@section('title')
    LKS_TOKO
@endsection
@section('content')
    
    <div class="py-5">
        <div class="container">
            @include('partial.frontcarousel')
            <div class="row mt-2">
                <h2>Feature</h2>
                    <div class="owl-carousel owl-theme">
                        @foreach ($trending as $ngetrend)
                    <div class="card border-0">
                        <img src="{{ asset('asset/upload/produk/'.$ngetrend->image) }}" alt="Produk">
                        <div class="card-body">
                            <h5>{{ $ngetrend->nama }}</h5>
                            <span class="float-start">Rp. {{ $ngetrend->harga_jual }}</span>
                            <span class="float-end text-danger"><s>Rp.{{ $ngetrend->original_harga }}</s></span>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                    <div class="owl-carousel owl-theme">
                        @foreach ($trending_category as $trend_kate)
                        <a href="{{ url('lihat-kategori/'.$trend_kate->slug) }}" class="text-decoration-none text-dark">
                    <div class="card border-0">
                        <img src="{{ asset('asset/upload/kategori/'.$trend_kate->image) }}" class="card-img-top" alt="Produk">
                        <div class="card-body">
                            <h5 class="card-title">{{ $trend_kate->nama }}</h5>
                            <p class="card-text">
                                {{ $trend_kate->deskripsi }}
                            </p>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
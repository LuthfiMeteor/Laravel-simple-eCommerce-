@extends('layouts.frontend')
@section('title', $produk->nama)

@section('content')
    <div class="py-4 mb-4 border-0 b">
        <div class="container">
            <h4 class="mb-0 text-decoration-none text-dark">
                <a href="{{ url('category') }}" class="text-decoration-none text-dark">Kategori</a>/
                <a href="{{ url('lihat-kategori/Elektronik') }}" class="text-decoration-none text-dark">Elektronik</a>/
                <a href="#" class="text-decoration-none text-dark">{{ $produk->nama }}</a>
            </h4>
        </div>
    </div>
    <section class="py-0">
            <div class="container px-1 px-lg-5 my-5 produk_data">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('asset/upload/produk/'.$produk->image) }}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="float-end badge bg-danger">{{ $produk->trending == '1'? 'Trending':'' }}</div><br>
                        <div class="small mb-1">slug : {{ $produk->slug }}</div>
                        <h1 class="display-5 fw-bolder">{{ $produk->nama }}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through text-danger">Rp. {{ $produk->original_harga }}</span>
                            <span>Rp. {{ $produk->harga_jual }}</span>
                        </div>
                        <p class="lead">{{ $produk->small_deskripsi }}</p>
                        <div class="d-flex">
                            <input type="hidden" value="{{ $produk->id }}" class="prod_id">
                            <button type="button" class="btn btn-secondary botder-end-0 rounded-0 decrement-btn" onclick="decrement()">-</button>
                            <input class="text-center rounded-0 qty-check" id="inputQuantity" type="num" min="0" value="1" style="max-width: 3rem" />
                            <button type="button" class="btn btn-secondary botder-end-0 rounded-0 me-3" onclick="increment()">+</button>
                            <button class="btn btn-outline-dark flex-shrink-0 me-3 increment-btn" type="button" >
                                <i class="bi-cart-fill me-1"></i>
                                Add to Wishlist
                            </button>
                            @if ($produk->qty >= 1)
                            <button class="btn btn-outline-dark flex-shrink-0 tambahkeranjang" type="button" id="tambahkeranjang">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                            @else
                            <button class="btn btn-danger disabled">Stok Habis</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 border-top mt-1">
                        <h4 class="mt-1">Deskripsi</h4>
                        <p>
                            {{ $produk->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
                $("#tambahkeranjang").click(function(e) {
                e.preventDefault();
                var produk_id = $(this).closest('.produk_data').find('.prod_id').val();
                var produk_qty = $(this).closest('.produk_data').find('.qty-check').val();
                
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                        url: "/tambah-ke-keranjang",
                        type: "POST",
                        data: {
                            'produk_id': produk_id,
                            'produk_qty':produk_qty,
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        success:function(response)
                        {
                            swal({title: "Berhasil", 
                                    text: response.status, 
                                    type: "success"}).then(function(){ 
                                location.reload();
                                }
                                );
                        }
                        });

            });
            
            });

    </script>
@endsection


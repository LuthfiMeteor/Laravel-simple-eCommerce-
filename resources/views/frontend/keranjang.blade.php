@extends('layouts.frontend')
@section('title')
    Keranjang Saya
@endsection
@section('content')
    
    <div class="py-4 mb-4 border-0 b">
        <div class="container">
            <h4 class="mb-0 text-decoration-none text-dark">
                <a href="{{ url('keranjang') }}" class="text-decoration-none text-dark">Keranjang</a>
            </h4>
        </div>
    </div>

    <section class="h-100 ">
  <div class="container h-100 py-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10 ">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p>
          </div>
        </div>

        <div class="card rounded-3 mb-4 ">
          <div class="card-body p-4 ">
            <div class="row d-flex justify-content-between align-items-center produk_hapus">
                @php
                    $total = 0;
                @endphp
                @foreach ($keranjang as $item)
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="{{ asset('asset/upload/produk/'.$item->produk->image) }}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{ $item->produk->nama }}</p>
                <p><span class="text-muted">Slug: </span>{{ $item->produk->slug }}
              </div>
              <div class="col-md-4 col-lg-4 col-xl-3 d-flex produk_data ">

                @if ($item->produk->qty > $item->prod_qty)
                <button class="btn btn-link px-2 updatejumlah" id="minusbtn" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="hidden" name="" class="prod_id" value="{{ $item->prod_id }}">
                <input id="qty" min="0" name="quantity" value="{{ $item->prod_qty }}" type="number"
                  class="form-control form-control-sm qty-input" />
                
                <button class="btn btn-link px-2 updatejumlah" id="plusbtn" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
                   @php
                  $total += $item->produk->harga_jual*$item->prod_qty;
              @endphp
               <a href="#" class="text-danger hapus" id="hapusbarang"><i class="fas fa-trash fa-lg"></i></a>
                @else
                <h6>Stok Habis</h6>
                @endif
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <p class="mb-0">Rp. {{ $item->produk->harga_jual }}</p>
              </div>
              
              @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Harga : Rp. {{ $total }}</h6>
                <a href="{{ url('checkout') }}">
                <button class="btn btn-success">Checkout</button>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection

@section('script')
    <script>
        
        $(document).ready(function() {
            // $("#plusbtn").click(function(e) {
            //     e.preventDefault();
            //     var inc_value = $(this).closest('.produk_data').find('#qty').val();
            //     var value = parseInt(inc_value, 10);
            //     value =isNaN(value) ? 0 : value;
            //     if(value < 10)
            //     {
            //         value++;
            //         $(this).closest('.produk_data').find('#qty').val(value);
            //     }
            // });
            // $("#minusbtn").click(function(e) {
            //     e.preventDefault();
            //     var dec_value = $(this).closest('.produk_data').find('#qty').val();
            //     var value = parseInt(dec_value, 10);
            //     value =isNaN(value) ? 0 : value;
            //     if(value > 1)
            //     {
            //         value--;
            //         $(this).closest('.produk_data').find('#qty').val(value);
            //     }
            // });
                $('.hapus').click(function(e){
                    e.preventDefault();

                    var prod_id = $(this).parent('.produk_data').find(".prod_id").val();
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                        url: "/hapus-dari-keranjang",
                        type: "POST",
                        data: {
                            'prod_id': prod_id
                        },
                        success:function(response)
                        {
                            swal({title: "Dihapus", 
                                    text: response.status, 
                                    type: "success"}).then(function(){ 
                                location.reload();
                                }
                                );
                        }
                        });
                });
                $(".updatejumlah").click(function(e){
                    e.preventDefault();
                    var prod_id = $(this).closest('.produk_data').find('.prod_id').val();
                    var qty = $(this).closest('.produk_data').find('#qty').val();
                    data = {
                        'prod_id': prod_id,
                        'prod_qty': qty,
                    }
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                        url: "update-keranjang",
                        type: "POST",
                        data: data,
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

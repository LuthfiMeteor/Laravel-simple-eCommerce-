@extends('layouts.frontend')
@section('name')
    Detail Order
@endsection
@section('content')
    <div class="container mt- mb-4">
    <div class="row d-flex cart align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="d-flex justify-content-center border-bottom">
                    <div class="p-3">
                        <div class="progresses">
                            @if ($order->status=='1')
                                <div class="steps-1"> <span><i class="fa fa-check"></i></span> </div> <span class="line-1"></span>
                            <div class="steps-1"> <span><i class="fa-solid fa-x"></i></span> </div> <span class="line" style="background-color:black;"></span>
                            <div class="">  </div>
                            @endif
                            @if ($order->status=='2')
                                <div class="steps-2"> <span><i class="fa fa-check text-dark"></i></span> </div> <span class="line-2"></span>
                            <div class="steps-2"> <span><i class="fa fa-warning text-dark"></i></span> </div> <span class="line"></span>
                            <div class=""> </div>
                            @endif
                            @if ($order->status=='3')
                                <div class="steps-3"> <span><i class="fa fa-check"></i></span> </div> <span class="line-3"></span>
                            <div class="steps-3"> <span><i class="fa fa-check"></i></span> </div> <span class="line-3"></span>
                            <div class="steps-3"> <span class="font-weight-bold">3</span> </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-6 border-right p-5">
                        <div class="text-center order-details">
                            <div class="d-flex justify-content-center mb-5 flex-column align-items-center"> 
                                
                            @if ($order->status=='1')
                                <span class="check1"><i class="fa fa-x"></i></span> 
                                <span class="font-weight-bold">Order Gagal</span>  
                            @endif
                            @if ($order->status=='2')
                                <span class="check2"><i class="fa fa-warning text-dark"></i></span> 
                                <span class="font-weight-bold">Order Pending</span>
                            @endif
                            @if ($order->status=='3')
                               <span class="check3"><i class="fa fa-check"></i></span>
                               <small>Terima Kasih</small>
                                <span class="font-weight-bold">Order Berhasil</span>
                            @endif
                                
                            
                            </div> <a href="{{ url('transaksi-saya') }}" class="btn btn-danger btn-block order-button">Go to your Order</a>
                        </div>
                    </div>
                    
                    <div class="col-md-6 background-muted">
                        <div class="p-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-center"> <span><i class="fa-solid fa-clock-rotate-left text-muted"></i>   {{ $order->created_at }}</span> </div>
                            <div class="mt-3">
                                <h6 class="mb-0 text-capitalize">Nama Lengkap : {{ $order->nama_lengkap }}</h6> <span class="d-block mb-0">Email : {{ $order->email }}</span> <small>Nomor HandPhone : {{ $order->no_hp }}</small>
                                <div class="d-flex flex-column mt-3"> <small><i class="fa fa-check text-muted"></i>Transaksi ID : {{ $order->tracking }}</small>  </div>
                            </div>
                        </div>
                           <table class="table table-responsive">
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Image</th>
                            </tr>
                            @foreach ($order->orders as $item)
                            <tr>
                                <td>{{ $item->produk->nama }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp. {{ $item->price }} x {{ $item->qty }}</td>
                                <td><img src="{{ asset('asset/upload/produk/'.$item->produk->image) }}" class="img-thumbnail" alt=""></td>
                            </tr>
                             @endforeach
                        </table>
                       <div class="fs-4 mb-3 float-end me-2">Total Harga : Rp.{{ $order->total_harga }}</div>
                    </div>
                </div>
                <div> </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.frontend')
@section('title')
    Transaksi Saya
@endsection
@section('content')
    <div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Daftar<b>  Transaksi</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="{{ url('category') }}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Order Lagi Yuk</span></a>					
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Order</th>				
                        <th>Nomor Transaksi</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                    <tr>
                        <td class="fs-6">{{ $item->created_at }}</td>
                        <td>{{ $item->tracking }}</td>
                        <td>Rp. {{ $item->total_harga }}</td>                        
                        <td>
                            @if ($item->status == '1')
                                <span class="status text-danger">&bull;</span>gagal
                            @endif
                            @if ($item->status == '2')
                                <span class="status text-warning">&bull;</span>pending
                            @endif
                            @if ($item->status == '3')
                                <span class="status text-success">&bull;</span>Berhasil
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('lihat-order/'.$item->id) }}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection
@section('script')
    <script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
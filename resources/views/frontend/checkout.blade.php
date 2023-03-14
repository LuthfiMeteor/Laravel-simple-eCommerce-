@extends('layouts.frontend')
@section('title')
    checkout
@endsection
@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="post">
            @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Detail</h6>
                        <hr>
                        <div class="row form-lanjut">
                            <div class="col-md-6">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama " name="nama" value="">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Masukan email" name="email" >
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Nomor Handphone</label>
                                <input type="number" class="form-control" placeholder="Masukan nomor Hp" name="no_hp">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Kota</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Kota" name="kota">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Provinsi</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama provinsi" name="provinsi">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Kode Pos</label>
                                <input type="number" class="form-control" placeholder="Masukan kode pos" name="kode_pos">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        Order Detail
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjang as $item)
                                    <tr>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>Rp. {{ $item->produk->harga_jual }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-success">Checkout!</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
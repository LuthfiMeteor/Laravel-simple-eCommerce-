@extends('layouts.frontend')
@section('title')
    checkout
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Detail</h6>
                        <hr>
                        <div class="row form-lanjut">
                            <div class="col-md-6">
                                <label for="">Nama Awal</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6">
                                <label for="">Nama Akhir</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Nomor Handphone</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Alamat 1</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Alamat 2</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Kota</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Kode Pos</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Awal">
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
                        <button class="btn btn-success">Checkout!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
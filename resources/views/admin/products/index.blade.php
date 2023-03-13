@extends('layouts.admin')
@section('main')
    <div class="card">
        <div class="card-header">
            kategori
        </div>

        <table class="table">
     <thead>
    <tr>
      <th scope="col">id</th>
      <th>Kategori</th>
      <th scope="col">Nama</th>
      <th>Harga Jual</th>
      <th>Image</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $produk)
        
    <tr>
      <th scope="row">{{ $produk->id }}</th>
      <th>{{ $produk->kategori->nama }}</th>
      <td>{{ $produk->nama }}</td>
      <td>{{ $produk->harga_jual }}</td>
      <td><img src="asset/upload/produk/{{ $produk->image }}" alt="" width="70px"></td>
      <td> <a href="edit-produk/{{ $produk->id }}" class="btn btn-info">Edit</a></td>
       <form action="hapus-produk/{{ $produk->id }}" method="post">
        @csrf
        @method('delete')
        <td class="text-center"><Input type="submit" value="Delete" class="btn btn-danger"></Input></td>
      </form>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="d-grid">
        <a href="/tambah-produk" class="btn btn-info">Tambah Produk</a>
    </div>
    </div>
        
@endsection
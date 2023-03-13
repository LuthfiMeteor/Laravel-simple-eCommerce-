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
      <th scope="col">Nama</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Image</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $kategori)
        
    <tr>
      <th scope="row">{{ $kategori->id }}</th>
      <td>{{ $kategori->nama }}</td>
      <td>{{ $kategori->deskripsi }}</td>
      <td><img src="asset/upload/kategori/{{ $kategori->image }}" alt=""></td>
      <td> <a href="edit-kategori/{{ $kategori->id }}" class="btn btn-info">Edit</a></td>
       <form action="hapus-kategori/{{ $kategori->id }}" method="post">
        @csrf
        @method('delete')
        <td class="text-center"><Input type="submit" value="Delete" class="btn btn-danger"></Input></td>
      </form>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="d-grid">
        <a href="/tambah-kategori" class="btn btn-info">Tambah Kategori</a>
    </div>
    </div> 
@endsection
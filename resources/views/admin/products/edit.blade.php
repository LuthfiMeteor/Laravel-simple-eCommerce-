@extends('layouts.admin')
@section('main')
    <div class="card">
        <div class="card-header">
            kategori
        </div>
        <div class="card-body">
            <form action="/edit-produk/proses/{{ $asal->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                     <div class="col-md-12 mb-3"> 
                        <select class="form-select" aria-label="Default select example" name="cate_id" required>
                        <option selected >Pilih kategori</option>
                        @foreach ($data as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $asal->nama }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $asal->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Deskripsis</label>
                        <textarea name="small_deskripsi" id="" rows="3" class="form-control" >{{ $asal->small_deskripsi }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="" rows="3" class="form-control">{{ $asal->deskripsi }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Harga Original</label>
                        <input type="number" name="original_harga" id="" class="form-control" value="{{ $asal->original_harga }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Harga Jual</label>
                        <input type="number" name="harga_jual" id="" class="form-control" value="{{ $asal->harga_jual }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Quantity</label>
                        <input type="number" name="qty" id="" class="form-control" value="{{ $asal->qty }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Tax</label>
                        <input type="number" name="tax" id="" class="form-control" value="{{ $asal->tax }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" id="" {{ $asal->status=="1"? 'checked':'' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">trending</label>
                        <input type="checkbox"  name="trending" {{ $asal->trending=="1"? 'checked':'' }}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $asal->meta_title }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" id="" rows="3" class="form-control">{{ $asal->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Deskripsi</label>
                        <textarea name="meta_deskripsi" id="" rows="3" class="form-control">{{ $asal->meta_deskripsi }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection
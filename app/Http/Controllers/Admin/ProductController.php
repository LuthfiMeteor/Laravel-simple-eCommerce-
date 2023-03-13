<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = product::all();
        return view('admin.products.index', compact('data'));
    }
    public function tambah()
    {
        $data = kategori::all();
        return view('admin.products.tambah', compact('data'));
    }
    public function insert(Request $req)
    {
        $produk = new Product();
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/upload/produk/', $filename);
            $produk->image = $filename;
        }
        $produk->cate_id = $req->input('cate_id');
        $produk->nama = $req->input('nama');
        $produk->slug = $req->input('slug');
        $produk->small_deskripsi = $req->input('small_deskripsi');
        $produk->deskripsi = $req->input('deskripsi');
        $produk->original_harga = $req->input('original_harga');
        $produk->harga_jual = $req->input('harga_jual');
        $produk->qty = $req->input('qty');
        $produk->tax = $req->input('tax');
        $produk->status = $req->input('status') == TRUE ? '1' : '0';
        $produk->trending = $req->input('trending') == TRUE ? '1' : '0';
        $produk->meta_keywords = $req->input('meta_keywords');
        $produk->meta_deskripsi = $req->input('meta_deskripsi');
        $produk->meta_title = $req->input('meta_title');
        $produk->save();
        return redirect('dashboard')->with('status', 'Product Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $data = kategori::all();
        $asal = Product::find($id);
        return view(
            'admin/products/edit',
            compact(['data','asal'])
        );
    }
    public function update($id, Request $req, Product $kate)
    {
        $produk = Product::find($id);
        if ($req->hasFile('image')) {
            $path = 'asset/upload/produk/' . $produk->image;
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/upload/produk/', $filename);
            $produk->image = $filename;
        }
        $produk->cate_id = $req->input('cate_id');
        $produk->nama = $req->input('nama');
        $produk->slug = $req->input('slug');
        $produk->small_deskripsi = $req->input('small_deskripsi');
        $produk->deskripsi = $req->input('deskripsi');
        $produk->original_harga = $req->input('original_harga');
        $produk->harga_jual = $req->input('harga_jual');
        $produk->qty = $req->input('qty');
        $produk->tax = $req->input('tax');
        $produk->status = $req->input('status') == TRUE ? '1' : '0';
        $produk->trending = $req->input('trending') == TRUE ? '1' : '0';
        $produk->meta_keywords = $req->input('meta_keywords');
        $produk->meta_deskripsi = $req->input('meta_deskripsi');
        $produk->meta_title = $req->input('meta_title');
        $produk->update();

        return redirect('dashboard')->with('status', 'Berhasil Update Data');
    }
    public function destroy($id, Request $request)
    {
        $kate = Product::find($id);
        $kate->delete();
        return redirect('dashboard')->with('status', 'produk Telah DIhapus');
    }
}

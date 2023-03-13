<?php

namespace App\Http\Controllers\Admin;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

class kategoriController extends Controller
{
    public function index()
    {
        $data = kategori::all();
        return view('admin.kategori.index', compact('data'));
    }
    public function tambah(){
        return view('admin.kategori.tambah');
    }
    public function insert(Request $req)
    {
        $kategori = new kategori();
        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/upload/kategori/',$filename);
            $kategori->image = $filename;
        }

        $kategori->nama = $req->input('nama');
        $kategori->slug = $req->input('slug');
        $kategori->deskripsi = $req->input('deskripsi');
        $kategori->status = $req->input('status') == TRUE?'1':'0';
        $kategori->popular = $req->input('popular') == TRUE ? '1' : '0';
        $kategori->meta_keywords = $req->input('meta_keywords');
        $kategori->meta_deskripsi = $req->input('meta_deskripsi');
        $kategori->meta_title = $req->input('meta_title');
        $kategori->save();
        
        return redirect('dashboard')->with('status', 'Kategori Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kate = kategori::find($id);
        return view(
            'admin/kategori/edit',compact(['kate'])
        );
    }
    public function update($id, Request $req, kategori $kate)
    {
        $kategori = kategori::find($id);
        if ($req->hasFile('image'))
        {
            $path = 'asset/upload/kategori/'.$kategori->image;
            if(Storage::exists($path))
            {
                Storage::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/upload/kategori/', $filename);
            $kategori->image = $filename;
        }
        $kategori->nama = $req->input('nama');
        $kategori->slug = $req->input('slug');
        $kategori->deskripsi = $req->input('deskripsi');
        $kategori->status = $req->input('status') == TRUE ? '1' : '0';
        $kategori->popular = $req->input('popular') == TRUE ? '1' : '0';
        $kategori->meta_keywords = $req->input('meta_keywords');
        $kategori->meta_deskripsi = $req->input('meta_deskripsi');
        $kategori->meta_title = $req->input('meta_title');
        $kategori->update();

        return redirect('dashboard')->with('status', 'Berhasil Update Data');
    
    }
    public function destroy($id, Request $request)
    {
        $kate = kategori::find($id);
        $kate->delete();
        return redirect('dashboard')->with('status', 'KAtegori Telah DIhapus');
    }
}

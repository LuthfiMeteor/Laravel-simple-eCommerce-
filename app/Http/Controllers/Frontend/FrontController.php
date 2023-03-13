<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\kategori;
use App\Models\keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $trending = Product::where('trending', '1')->take(15)->get();
        $trending_category = kategori::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('trending', 'trending_category'));
    }
    public function category()
    {
        $category = kategori::where('status', '0')->get();
        return view('frontend.category',compact('category'));
    }
    public function lihatkategori($slug)
    {
        if(kategori::where('slug', $slug)->exists())
        {
            $category = kategori::where('slug', $slug)->first();
            $produk = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.produk.index',compact('category','produk'));
        }
        else
        {
            return redirect('category')->with('status','Produk Tidak Ditemukan');
        }
        
    }
    public function lihatproduk($cate_slug, $prod_slug)
    {
        if (kategori::where('slug', $cate_slug)->exists()) 
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $produk = Product::where('slug',$prod_slug)->first();
                return view('frontend.produk.lihat',compact('produk'));
            }
            else
            {
                return redirect('/')->with('status', 'lINK Bermasalah');
            }
        }
        else
        {
            return redirect('/')->with('status', 'Tidak Ditemukan');
        }
    }
    public function tambahproduk(Request $req)
    {
        $produk_id = $req->input('produk_id');
        $produk_qty = $req->input('produk_qty');

        if (Auth::check()) {
            $prod_cek = Product::where('id', $produk_id)->first();
            if ($prod_cek) {
                if (keranjang::where('prod_id', $produk_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_cek->nama .  " Sudah Ada Dikeranjang"]);
                } else {
                    $keranjang = new keranjang();
                    $keranjang->prod_id = $produk_id;
                    $keranjang->user_id = Auth::id();
                    $keranjang->prod_qty = $produk_qty;
                    $keranjang->save();
                    return response()->json(['status' => $prod_cek->nama . " Berhasil DItambahkan Ke Keranjang"]);
                }
            }
        } else {
            return response()->json(['status' => "Login Dulu Yaaa"]);
        }
    }
}

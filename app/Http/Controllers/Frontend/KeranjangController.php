<?php

namespace App\Http\Controllers\Frontend;

use App\Models\keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function lihatkeranjang()
    {
        $keranjang = keranjang::where('user_id', Auth::id())->get();
        return view('frontend.keranjang', compact('keranjang'));
    }
    public function hapusdarikeranjang( Request $req)
    {
        if (Auth::check()) {
            $prod_id=$req->input('prod_id');
            if(keranjang::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
            {
                $keranjang = keranjang::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $keranjang->delete();
                return response()->json(['status' => "Produk Berhasil Dihapus dari keranjang"]);
            }   
        } else {
            return response()->json(['status' => "Login Dulu Yaaa"]);
        }
    }
    public function updatekeranjang(Request $req)
    {
        $prod_id = $req->input('prod_id');
        $prod_qty = $req->input('prod_qty');
        if(Auth::check())
        {
            if(keranjang::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
            {
                $keranjang = keranjang::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $keranjang->prod_qty = $prod_qty;
                $keranjang->update();
                return response()->json(['status' => "Berhasil Update Jumlah"]);
            }
        }
    }
}

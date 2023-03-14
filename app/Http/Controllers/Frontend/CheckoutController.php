<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\keranjang;
use App\Models\order;
use App\Models\order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $keranjang= keranjang::where('user_id', Auth::id())->get();
        $data = order::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('keranjang', 'data'));
    }
    public function placeorder(Request $req)
    {
        $order = new order();
        $order->nama_lengkap = $req->input('nama');
        $order->user_id = Auth::id();
        $order->email = $req->input('email');
        $order->no_hp = $req->input('no_hp');
        $order->alamat = $req->input('alamat');
        $order->kota = $req->input('kota');
        $order->provinsi = $req->input('provinsi');
        $order->kode_pos = $req->input('kode_pos');
        $order->tracking = 'toko'.rand(1111,9999);

        $order->save();

        $order->id;


        $keranjang = keranjang::where('user_id', Auth::id())->get();
        foreach($keranjang as $item)
        {
            order_item::create([
                'order_id'=>$order->id,
                'prod_id'=> $item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->produk->harga_jual,
            ]);
            $produk = Product::where('id', $item->prod_id)->first();
            $produk->qty = $produk->qty - $item->prod_qty;
            $produk->update(); 
        }
        $keranjang = keranjang::where('user_id', Auth::id())->get();
        keranjang::destroy($keranjang);
        return redirect('/')->with('status', "Order Telah Berhasil");
    }
}
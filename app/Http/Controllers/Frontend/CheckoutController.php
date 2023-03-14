<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $keranjang= keranjang::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('keranjang'));
    }
    public function placeorder(Request $req)
    {
        
    }
}

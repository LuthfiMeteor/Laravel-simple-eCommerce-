<?php

namespace App\Http\Controllers\Frontend;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $transaksi = order::where('user_id', Auth::id())->get();
        return view('frontend.order.index', compact('transaksi'));
    }
    public function lihat($id)
    {
        $order =order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.order.view', compact('order'));
    }
}

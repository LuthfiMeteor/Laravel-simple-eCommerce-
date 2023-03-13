<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $guared = [];


    public function produk()
    {
        return $this->belongsTo(Product::class, 'prod_id','id');
    }

}

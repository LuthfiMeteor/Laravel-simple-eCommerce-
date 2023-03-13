<?php

namespace App\Models;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];


    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'cate_id', 'id');
    }
}


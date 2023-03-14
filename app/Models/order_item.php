<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class order_item extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $guarded = [];


    public function produk(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}

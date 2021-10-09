<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function connect_product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}

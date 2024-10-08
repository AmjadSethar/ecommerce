<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductColor;
class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected  $fillable = [
        'user_id',
        'product_id',
        'product_color_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class,'product_color_id','id');
    }
}

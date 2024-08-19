<?php

namespace App\Models;

use App\Http\Controllers\Admin\ColorController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImages;
use App\Models\ProductColor;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'featured',
        'trending',
        'status',

        'meta_title',
        'meta_keyword',
        'meta_description',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class,'product_id','id');
    }

    public function ProductColors()
    {
        return $this->hasMany(ProductColor::class,'product_id','id');
    }


}

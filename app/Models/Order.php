<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
            'user_id',
            'tracking_no',
            'fullname',
            'email',
            'phone',
            'pincode',
            'address',
            'status_message',
            'payment_mode',
            'payment_id',
    ];
    
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
}

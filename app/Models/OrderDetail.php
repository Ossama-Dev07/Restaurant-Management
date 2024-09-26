<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';
    protected $fillable = ['order_id', 'meal_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
    }
}

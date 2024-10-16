<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'category_id', 'is_available'];

    public function category()
    {
        return $this->belongsTo(MealCategory::class, 'category_id');
    }
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->name : 'No Category';
    }
}


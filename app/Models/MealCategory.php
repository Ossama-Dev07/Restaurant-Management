<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable = ['name', 'description'];
}


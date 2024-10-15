<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealCategory extends Model
{
     protected $table = 'meal_categorys';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
}


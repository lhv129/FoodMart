<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'brand_id',
        'unit_id',
        'name',
        'image',
        'fileImage',
        'entry_price',
        'retail_price',
        'slug',
        'deleted_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'sub_total',
        'deleted_at',
    ];
}

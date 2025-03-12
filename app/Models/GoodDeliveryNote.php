<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodDeliveryNote extends Model
{
    use HasFactory;

    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'payment_method_id',
        'customer',
        'code',
        'total_price',
        'status',
        'deleted_at'
    ];
}

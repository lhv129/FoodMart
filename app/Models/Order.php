<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'payment_method_id',
        'customer',
        'email',
        'phone',
        'address',
        'note',
        'code',
        'total_price',
        'status',
        'deleted_at'
    ];
}

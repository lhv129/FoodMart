<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodDeliveryNoteDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'good_delivery_note_id',
        'product_id',
        'quantity',
        'sub_total',
        'deleted_at'
    ];
}

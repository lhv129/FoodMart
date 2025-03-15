<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'slug',
        'fileName',
        'image',
        'deleted_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'category_id',
        'unit_id',
        'name',
        'image',
        'fileImage',
        'entry_price',
        'retail_price',
        'slug',
        'deleted_at',
        'description',
        'discount'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getTopSellingProducts($limit = 3)
    {
        return self::with('category') // Eager load category relationship
            ->orderBy('TopRate', 'desc')
            ->take($limit)
            ->get();
    }
}

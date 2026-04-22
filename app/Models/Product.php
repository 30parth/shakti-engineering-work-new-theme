<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'description',
        'hsn',
        'unit',
        'sales_price',
        'tax_type',
        'gst',
        'cess',
        'created_by',
        'updated_by',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->created_by = auth()->id();
            $product->updated_by = auth()->id();
        });

        static::updating(function ($product) {
            $product->updated_by = auth()->id();
        });
    }
}

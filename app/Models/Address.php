<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_id',
        'address',
        'city',
        'state',
        'pin_code',
        'country',
        'created_by',
        'updated_by',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($address) {
            $address->created_by = auth()->id();
            $address->updated_by = auth()->id();
        });

        static::updating(function ($address) {
            $address->updated_by = auth()->id();
        });
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}

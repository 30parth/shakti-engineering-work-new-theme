<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_type',
        'company_name',
        'name',
        'email',
        'phone',
        'gst_no',
        'gst_treatment_type',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($account) {
            $account->created_by = auth()->id();
            $account->updated_by = auth()->id();
        });

        static::updating(function ($account) {
            $account->updated_by = auth()->id();
        });
    }

    public function addresses()
    {
        return $this->hasOne(Address::class, 'account_id', 'id')->where('deleted_at', null);
    }
}

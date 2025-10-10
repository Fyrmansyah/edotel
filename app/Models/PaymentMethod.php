<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = ['id'];

    public static function getQris()
    {
        return PaymentMethod::query()->where('name', 'qris')->first();
    }
}

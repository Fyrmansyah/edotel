<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $guarded = ['id'];

    const KAMAR_MEDIUM = 'Harga Kamar - Medium';
    const KAMAR_LARGE = 'Harga Kamar - Large';
    const EXTRA_MAKAN = 'Extra Makan';
    const EXTRA_KASUR = 'Extra Kasur';

    static function getPriceOfJenis(string $jenis): int
    {
        $pricing = null;
        switch ($jenis) {
            case 'medium':
                $pricing = Pricing::query()->where('name', self::KAMAR_MEDIUM)->first()->value;
                break;
            case 'large':
                $pricing = Pricing::query()->where('name', self::KAMAR_LARGE)->first()->value;
                break;
        }

        return $pricing;
    }

    static function getCurrentExtraKasurPrice(): int
    {
        return Pricing::query()->where('name', self::EXTRA_KASUR)->first()->value;
    }

    static function getCurrentExtraMakanPrice(): int
    {
        return Pricing::query()->where('name', self::EXTRA_MAKAN)->first()->value;
    }
}

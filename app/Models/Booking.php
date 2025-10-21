<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Number;

class Booking extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['total_price', 'detail_extra_kasur', 'detail_extra_makan', 'lama_menginap'];

    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CHECKED_IN = 'checked_in';
    const STATUS_CHECKED_OUT = 'checked_out';

    const KAMAR_MEDIUM = 'medium';
    const KAMAR_LARGE = 'large';

    public function detailExtraKasur(): Attribute
    {
        return Attribute::make(get: function () {
            if (!$this->extra_kasur) {
                return '-';
            }

            return $this->extra_kasur .  " x " . Number::currency($this->extra_kasur_price, 'IDR', 'id', 0) . " / malam";
        });
    }

    public function detailExtraMakan(): Attribute
    {
        return Attribute::make(get: function () {
            if (!$this->extra_makan) {
                return '-';
            }

            return $this->extra_makan .  " x " . Number::currency($this->extra_makan_price, 'IDR', 'id', 0);
        });
    }

    public function lamaMenginap(): Attribute
    {
        return Attribute::make(get: function () {
            return Carbon::parse($this->check_out)->diffInDays(Carbon::parse($this->check_in), true);
        });
    }

    public function dpPrice(): Attribute
    {
        return Attribute::make(get: function () {

            if (!$this->check_in || !$this->check_out || !$this->harga_kamar) {
                return 0;
            }

            $lama_menginap = Carbon::parse($this->check_out)->diffInDays(Carbon::parse($this->check_in), true);

            $total = $lama_menginap * (int) $this->harga_kamar;

            if ($this->extra_kasur && $this->extra_kasur_price) {
                $total += $lama_menginap * $this->extra_kasur * (int) $this->extra_kasur_price;
            }

            if ($this->extra_makan && $this->extra_makan_price) {
                $total += $this->extra_makan * (int) $this->extra_makan_price;
            }

            return $total / 2;
        });
    }

    public function totalPrice(): Attribute
    {
        return Attribute::make(get: function () {

            if (!$this->check_in || !$this->check_out || !$this->harga_kamar) {
                return 0;
            }

            $lama_menginap = Carbon::parse($this->check_out)->diffInDays(Carbon::parse($this->check_in), true);

            $total = $lama_menginap * (int) $this->harga_kamar;

            if ($this->extra_kasur && $this->extra_kasur_price) {
                $total += $lama_menginap * $this->extra_kasur * (int) $this->extra_kasur_price;
            }

            if ($this->extra_makan && $this->extra_makan_price) {
                $total += $this->extra_makan * (int) $this->extra_makan_price;
            }

            return $total;
        });
    }

    public function kamar(): BelongsTo
    {
        return $this->belongsTo(Kamar::class);
    }
}

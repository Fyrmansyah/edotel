<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\BookingRequest;
use App\Models\Booking;
use App\Models\PaymentMethod;
use App\Models\Pricing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    function formView()
    {
        $pricings = Pricing::all()->keyBy('name');

        return Inertia::render('Client/FormBooking', compact('pricings'));
    }

    function createBooking(BookingRequest $bookingRequest)
    {
        $data = $bookingRequest->validated();
        $harga_kamar = Pricing::getPriceOfJenis($data['jenis_kamar']);

        $data = array_merge($data, compact('harga_kamar'));

        if ($data['extra_kasur']) {
            $extra_kasur_price = Pricing::getCurrentExtraKasurPrice();
            $data = array_merge($data, compact('extra_kasur_price'));
        }

        if ($data['extra_makan']) {
            $extra_makan_price = Pricing::getCurrentExtraMakanPrice();
            $data = array_merge($data, compact('extra_makan_price'));
        }

        $b = Booking::create($data);
        $b->booking_id = Carbon::now()->format('Ymd') . $b->id;
        $b->save();

        return redirect("/booking/{$b->id}");
    }

    function bookingDetail(Booking $booking)
    {
        $qris = PaymentMethod::getQris();
        return Inertia::render('Client/BookingDetail', compact('booking', 'qris'));
    }
}

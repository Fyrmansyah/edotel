<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\BookingRequest;
use App\Models\Booking;
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
        $b = Booking::create($bookingRequest->validated());
        $b->booking_id = Carbon::now()->format('Ymd') . $b->id;
        $b->save();

        return redirect("/booking/{$b->id}");
    }

    function bookingDetail(Booking $booking)
    {
        return Inertia::render('Client/BookingDetail', compact('booking'));
    }
}

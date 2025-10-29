<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function index(string $booking_id)
    {
        $booking = Booking::where('booking_id', $booking_id)->first();

        return Inertia::render('Client/Invoice', compact('booking'));
    }
}

<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookingController extends Controller
{
    function index()
    {
        $bookings = Booking::query()->latest()->paginate(10);
        $total_bookings = Booking::count();

        return Inertia::render('Backoffice/Booking/Index', compact('bookings', 'total_bookings'));
    }
    function update(Booking $booking, Request $request)
    {
        $booking->update(['status' => $request->status]);

        return back()->with(['success' => 'Sukses mengupdate status booking']);
    }
}

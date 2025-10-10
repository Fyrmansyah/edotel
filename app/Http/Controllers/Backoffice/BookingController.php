<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BookingController extends Controller
{
    function index(Request $request)
    {
        $bookings = Booking::query()
            ->when($request->check_in, function ($query, $check_in) {
                $query->where('check_in', '=', $check_in);
            })
            ->when($request->check_out, function ($query, $check_out) {
                $query->where('check_out', '=', $check_out);
            })
            ->latest()
            ->paginate(10);

        $total_bookings = Booking::count();

        return Inertia::render('Backoffice/Booking/Index', compact('bookings', 'total_bookings'));
    }
    function update(Booking $booking, Request $request)
    {
        $booking->update(['status' => $request->status]);

        return back()->with(['success' => 'Sukses mengupdate status booking']);
    }
}

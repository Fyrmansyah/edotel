<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BookingController extends Controller
{
    function index(Request $request)
    {
        $bookings = Booking::query()
            ->with('kamar')
            ->when($request->check_in, function ($query, $check_in) {
                $query->where('check_in', '=', $check_in);
            })
            ->when($request->check_out, function ($query, $check_out) {
                $query->where('check_out', '=', $check_out);
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', '=', $status);
            })
            ->latest()
            ->paginate(10);

        $total_bookings = Booking::count();

        return Inertia::render('Backoffice/Booking/Index', compact('bookings', 'total_bookings'));
    }

    public function availableRooms(Booking $booking)
    {

        $mapping = [
            'medium' => 'sedang',
            'large' => 'besar',
        ];
        $jenisKamar = $mapping[$booking->jenis_kamar] ?? $booking->jenis_kamar;

        $bookedRoomIds = Booking::whereNotNull('kamar_id')
            ->where(function ($q) use ($booking) {
                $q->where('check_in', '<=', $booking->check_out)
                    ->where('check_out', '>=', $booking->check_in);
            })
            ->pluck('kamar_id')
            ->toArray();

        $rooms = Kamar::where('jenis', $jenisKamar)->get();

        $roomsWithAvailability = $rooms->map(function ($room) use ($bookedRoomIds) {
            return [
                'id' => $room->id,
                'nomor' => $room->nomor,
                'jenis' => $room->jenis,
                'is_available' => !in_array($room->id, $bookedRoomIds),
            ];
        });

        return response()->json([
            'kamar' => $roomsWithAvailability,
        ]);
    }


    function update(Booking $booking, Request $request)
    {

        if ($request->status === Booking::STATUS_APPROVED) {
            if (!$request->kamar_id) {
                return back()->with('error', 'Anda harus memilih nomor kamar');
            }
            $booking->update(['status' => $request->status, 'kamar_id' => $request->kamar_id]);
        } else if ($request->status === Booking::STATUS_REJECTED) {
            $booking->update(['status' => $request->status, 'kamar_id' => null, 'admin_note' => $request->admin_note]);
        } else {
            $booking->update(['status' => $request->status]);
        }

        return back()->with(['success' => 'Sukses mengupdate status booking']);
    }
}

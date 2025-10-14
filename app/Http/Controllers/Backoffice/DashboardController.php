<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // ambil bulan dari request, jika tidak ada gunakan bulan sekarang
        $date = $request->get('date', now()->format('Y-m'));

        // parsing bulan dan tahun dari input
        [$year, $month] = explode('-', $date);
        $start = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $end = Carbon::createFromDate($year, $month, 1)->endOfMonth();


        $bookings = Booking::query()
            ->whereBetween('check_in', [$start, $end]);


        // === Contoh dummy data ===
        // nanti bisa ganti ini dengan query ke database
        $total_created_booking = (clone $bookings)->count();
        $total_cancelled_booking = (clone $bookings)->where('status', Booking::STATUS_REJECTED)->count();
        $total_revenue = (clone $bookings)
            ->where('status', Booking::STATUS_CHECKED_IN)
            ->get()
            ->sum(fn($booking) => $booking->total_price);

        $kpis = compact(
            'total_created_booking',
            'total_cancelled_booking',
            'total_revenue',
        );

        $dates = collect();
        $series_data = collect();
        for ($d = $start->copy(); $d->lte($end); $d->addDay()) {
            $dates->push($d->format('j-M'));

            $total = Booking::query()
                ->whereDate('check_in', $d->format('Y-m-d'))
                ->where('status', Booking::STATUS_CHECKED_IN)
                ->get()
                ->sum(fn($booking) => $booking->total_price);
            $series_data->push($total);
        }

        $chart = [
            'series' => [
                [
                    'name' => 'Total Revenue',
                    'data' => $series_data,
                ],
            ],
            'categories' => $dates,
        ];

        return Inertia::render('Backoffice/Dashboard', compact(
            'date',
            'kpis',
            'chart'
        ));
    }
}

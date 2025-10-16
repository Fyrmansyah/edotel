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
        $date = $request->get('date', now()->format('Y-m'));

        [$year, $month] = explode('-', $date);
        $start = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $end = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        $bookings = Booking::query()
            ->whereBetween('check_in', [$start, $end]);

        $total_created_booking = (clone $bookings)->count();
        $total_cancelled_booking = (clone $bookings)->where('status', Booking::STATUS_REJECTED)->count();
        $total_revenue = (clone $bookings)
            ->whereIn('status', [Booking::STATUS_CHECKED_IN, Booking::STATUS_CONFIRMED, Booking::STATUS_CHECKED_OUT])
            ->get()
            ->sum(function ($booking) {
                if ($booking->status === Booking::STATUS_CHECKED_IN || $booking->status === Booking::STATUS_CHECKED_OUT) {
                    return $booking->total_price;
                } elseif ($booking->status === Booking::STATUS_CONFIRMED) {
                    return $booking->dp_price;
                }
                return 0;
            });

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
                ->whereIn('status', [Booking::STATUS_CHECKED_IN, Booking::STATUS_CONFIRMED, Booking::STATUS_CHECKED_OUT])
                ->get()
                ->sum(function ($booking) {
                    if ($booking->status === Booking::STATUS_CHECKED_IN || $booking->status === Booking::STATUS_CHECKED_OUT) {
                        return $booking->total_price;
                    } elseif ($booking->status === Booking::STATUS_CONFIRMED) {
                        return $booking->dp_price;
                    }
                    return 0;
                });
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

<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PricingController extends Controller
{
    function index()
    {
        $pricings = Pricing::query()->orderBy('id')->get();
        $qris = PaymentMethod::query()->where('name', 'qris')->first();

        return Inertia::render('Backoffice/Pricing/Index', compact('pricings', 'qris'));
    }

    function update(Pricing $pricing, Request $request)
    {
        $pricing->update(['value' => $request->value]);

        return back()->with('success', 'Sukses mengupdate harga');
    }
}

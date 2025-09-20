<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PricingController extends Controller
{
    function index() {
        $pricings = Pricing::query()->orderBy('id')->get();

        return Inertia::render('Backoffice/Pricing/Index', compact('pricings'));
    }

    function update(Pricing $pricing, Request $request) {
        $pricing->update(['value' => $request->value]);

        return back()->with('success', 'Sukses mengupdate harga');
    }
}

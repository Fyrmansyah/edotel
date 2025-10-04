<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    public function updateQris(Request $request)
    {
        $p = PaymentMethod::where('name', 'qris')->first();

        if ($p && Storage::exists($p->image)) {
            Storage::delete($p->image);
        }

        $extention = $request->file('qris_image')->getClientOriginalExtension();
        $path = $request->file('qris_image')->storeAs('payment_methods', 'qris.' . $extention);
        PaymentMethod::updateOrCreate(
            ['name' => 'qris'],
            ['name' => 'qris', 'image' => $path]
        );

        return back()->with(['success' => 'Sukses memperbarui data']);
    }
}

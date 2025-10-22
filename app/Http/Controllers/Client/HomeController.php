<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        $photos = Photo::all();
        $pricings = Pricing::all()->mapWithKeys(fn($item) => [
            $item->name => $item->value
        ]);
        $admin_phone = config('app.admin_phone');

        return Inertia::render('Client/Home', compact('photos', 'pricings', 'admin_phone'));
    }
}

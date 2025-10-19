<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        return Inertia::render('Backoffice/Setting/Index');
    }

    public function updateAudio(Request $request)
    {
        try {
            $file = $request->file('sound');
            $file->move(public_path('backoffice/assets/sounds'), 'booking-notification.mp3');

            return back()->with('success', 'Sukses mengupdate audio');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}

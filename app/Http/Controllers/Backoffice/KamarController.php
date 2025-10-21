<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\KamarRequest;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();

        return Inertia::render('Backoffice/Kamar/Index', compact('kamars'));
    }

    public function create(KamarRequest $request)
    {
        $data = $request->validated();

        if (Kamar::query()->where('nomor', $data['nomor'])->exists()) {
            return back()->with('error', 'Nomor kamar: ' . $data['nomor'] . " telah ada");
        }

        Kamar::create($data);

        return back()->with('success', 'Sukses menambahkan kamar baru');
    }

    public function update(Kamar $kamar, KamarRequest $request)
    {
        $kamar->update($request->validated());

        return back()->with('success', 'Sukses memperbarui data');
    }

    public function delete(Kamar $kamar)
    {
        try {
            $kamar->delete();

            return back()->with('success', 'Sukses menghapus kamar');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}

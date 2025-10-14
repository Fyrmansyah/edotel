<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();

        return Inertia::render('Backoffice/Photo/Index', compact('photos'));
    }

    public function create()
    {
        $photos = Photo::all();

        return Inertia::render('Backoffice/Photo/Form', [
            'photos' => $photos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $directory = 'photos';

            if (Storage::directoryExists($directory)) {
                Storage::deleteDirectory($directory);
                Storage::createDirectory($directory);
                Photo::truncate();
            }

            if ($request->hasFile('photos')) {
                $photos = [];
                foreach ($request->file('photos') as $p) {
                    $path = $p->store($directory);
                    array_push($photos, ['path' => $path]);
                }
                Photo::insert($photos);
            }

            return back()->with('success', 'Sukses upload photo');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}

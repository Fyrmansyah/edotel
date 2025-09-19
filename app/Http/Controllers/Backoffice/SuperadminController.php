<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::query()->where('role', Admin::ROLE_SUPERADMIN)->paginate(10);

        return Inertia::render('Backoffice/SuperadminListing', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Admin::create(array_merge($request->validated(), ['role' => 'superadmin']));

        return back()->with('success', 'Sukses membuat data baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

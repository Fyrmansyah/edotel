<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::query()->latest()->paginate(10);

        return Inertia::render('Backoffice/Account/Index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Admin::create($request->validated());

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
    public function update(AdminRequest $request, string $id)
    {
        $admin = Admin::query()->where('id', $id)->first();
        if (!$admin) {
            return back()->with('error', 'account tidak ditemukan');
        }

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $admin->update($data);

        return back()->with('success', 'Sukses mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::query()->where('id', $id)->first();
        if (!$admin) {
            return back()->with('error', 'account tidak ditemukan');
        }

        $admin->delete();

        return back()->with('success', 'Sukses menghapus data');
    }
}

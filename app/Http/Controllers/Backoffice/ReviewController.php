<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::query()
            ->latest()
            ->paginate(10);

        return Inertia::render('Backoffice/Review/Index', compact('reviews'));
    }

    public function delete(Review $review)
    {
        $review->delete();

        return back()->with('success', 'Sukses menghapus review');
    }
}

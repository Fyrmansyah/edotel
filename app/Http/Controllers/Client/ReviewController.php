<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function postReview(ReviewRequest $request)
    {
        Review::create($request->validated());
        return back()->with('success', 'Terima kasih atas review anda');
    }
}

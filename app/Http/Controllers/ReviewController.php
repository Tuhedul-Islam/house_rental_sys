<?php

namespace App\Http\Controllers;

use App\Models\HouseReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function allReviews(){
        $reviews = HouseReview::with('reviewBy', 'reviewedHouse')->orderBy('id', 'DESC')->get();
        return view('backend.system-management.review.index', compact('reviews'));
    }

    public function reviewDelete($id){
        $review = HouseReview::find($id);
        $review->delete();

        toastr()->success('Data has been Deleted successfully!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type=null)
    {
        request()->validate([
            'review_message'  => 'required',
        ]);

        $review     = new Review();

        if ($type == 'company') {
            $review->company_id     = $request->company_id;
        }
        elseif ($type == 'profile') {
            $review->worker_profile_id = $request->worker_profile_id;
        }

        $review->review_message     = $request->review_message;
        $review->user_id            = $request->user_id;
        $review->status             = $request->status;
        $review->save();

        if ($request->rate_number) {
            $rating                 = new Rating;
            $rating->user_id        = $request->user_id;

            if ($type == 'company') {
                $rating->company_id         = $request->company_id;
            }
            elseif ($type == 'profile') {
                $rating->worker_profile_id  = $request->worker_profile_id;
            }

            $rating->rate_number    = $request->rate_number;
            $rating->status         = $request->status;
            $rating->save();
        }

        return back()->with('success','Thanks for submitting your review and rating!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Review::find($id);
        $item->delete();
        return back()->with('danger', 'Reviews deleted successfully!');
    }
}

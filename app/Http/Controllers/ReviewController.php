<?php

namespace App\Http\Controllers;

use App\Models\HirerResource;
use App\Models\User;
use App\Models\Review;
use App\Models\Resource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create(HirerResource $hirerResource)
    {
        $hirerResource->load('resource');

        return view("reviews.new", compact("hirerResource"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|max:255",
            "review" => "required|min:3|max:1000",
            "engagementId" => "required|numeric",
        ]);

        $review = Review::where(
            "hirer_resource_id",
            $validated["engagementId"]
        )->get();

        if (count($review) > 0) {
            abort(404);
        }

        $user = Auth::id();

        $review = new Review($validated);
        //        $review->title = $validated['title'];
        //        $review->review = $validated['review'];
        $hirerResource = HirerResource::find($validated["engagementId"]);

        // TODO: Make it dynamic
        $review->rating = 4.8;

        $review->hirerResource()->associate($hirerResource);
        $review->user()->associate($user);

        $saved = $review->save();

        if ($saved) {
            $hirerResource->completed = true;
            $hirerResource->update();

            # TODO Insert a record into Events table
            return redirect("/dashboard");
        }
        return redirect()
            ->back()
            ->withErrors($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

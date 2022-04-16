<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Event;
use App\Models\Hirer;
use App\Models\HirerResource;
use App\Models\Portfolio;
use App\Models\Resource;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $resources = Resource::limit(25)->orderBy("created_at", "desc")->get();
        return view("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = [
            "usr" => Auth::user()->name,
            "email" => Auth::user()->email,
        ];

        $countries = Country::pluck("name", "id")->all();

        return view("resources.new", compact("user", "countries"));
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
            "name" => "required|max:255",
            "email" => "required|unique:resources|email:rfc,dns",
            "describe" => "required|min:3|max:1000",
            "country" => "required",
            "skills" => "required",
            "hourly_rate" => "required|numeric|min:1|max:500",
            "weekly_rate" => "required|numeric|min:1|max:500",
            "monthly_rate" => "required|numeric|min:1|max:500",
        ]);

        $user = User::find(Auth::id());

        if (!$user->resource) {
            // TODO: Refactor this
            // TODO: Populated user_id with logged in id, needs testing.
            $resource = new Resource();

            // $resource->name = $request->input('name');
            $resource->email = $request->input("email");
            $resource->describe = $request->input("describe");
            $resource->country = $request->input("country");
            $resource->skills = $request->input("skills");
            $resource->hourly_rate = $request->input("hourly_rate");
            $resource->weekly_rate = $request->input("weekly_rate");
            $resource->monthly_rate = $request->input("monthly_rate");
            $resource->user_id = Auth::id();

            $saved = $user->owner()->save($resource);

            if ($saved) {
                $event = new Event([
                    "narration" => "Registered your profile",
                ]);
                $event->user()->associate(Auth::id());
                $event->createdBy()->associate(Auth::id());
                $event->save();

                return redirect("dashboard");
            }

            return redirect()
                ->back()
                ->withErrors($validated);
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        $portfolios = Portfolio::where("resource_id", $resource->id)->get();
        $hirerResources = HirerResource::where(
            "resource_id",
            $resource->id
        )->pluck("id");
        $reviews = Review::whereIn("hirer_resource_id", $hirerResources)->get();
        return view(
            "resources.show",
            compact("resource", "portfolios", "reviews")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        Stripe::setApiKey("sk_test_Ibzmh9GR069jLfNqQ9zidJ3g");

        $paymentIntent = PaymentIntent::create([
            "amount" => "1000",
            "currency" => "inr",
        ]);

        $output = [
            "clientSecret" => $paymentIntent->client_secret,
        ];

        return response()->json($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}

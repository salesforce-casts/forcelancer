<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Resource;
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
        $resources = Resource::limit(25)->orderBy("created_at", "desc")->get();
        return view('index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = [
            'usr' => Auth::user()->name,
            'email' => Auth::user()->email
        ];


        $countries = Country::pluck('name', 'id')->all();

        return view('resources.new', compact('user', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:resources|email:rfc,dns',
            'describe' => 'required|min:3|max:1000',
            'country' => 'required',
            'hourly_rate' => 'required|numeric|min:1|max:500',
            'weekly_rate' => 'required|numeric|min:1|max:500',
            'monthly_rate' => 'required|numeric|min:1|max:500'
        ]);
        $resource = Resource::create($validated);
        return redirect()->back()->withInput($resource)->withErrors($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        Stripe::setApiKey('sk_test_Ibzmh9GR069jLfNqQ9zidJ3g');

        $paymentIntent = PaymentIntent::create([
            'amount' => '1000',
            'currency' => 'inr',
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];

        return response()->json($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}

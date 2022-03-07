<?php

namespace App\Http\Controllers;

use App\Models\Hirer;
use App\Models\HirerResource;
use App\Models\Resource;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class RazorpayController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $resourceDetails = $request->input("resourceDetails");

        $resourceId = $resourceDetails["resource_id"];
        $selectedHiringMode = $resourceDetails["selected_hiring_mode"];
        $finalCharges = $resourceDetails["final_charges"];
        $noOfHours = $resourceDetails["no_of_hours"];

        $resource = Resource::find($resourceId);

        $keyId = env('RAZORPAY_KEY');
        $secret = env('RAZORPAY_SECRET');

        $api = new Api($keyId, $secret);
        // TODO: Change this to HirerResource
        $hireResourceCount = Transaction::count();

        $receiptId = '#' . str_pad($hireResourceCount + 1, 8, "0", STR_PAD_LEFT);
        // # TODO: Create a Receipt record in the table and use the id here
        $order = $api->order->create(array('receipt' => $receiptId, 'amount' => 100, 'currency' => 'INR'));

        $hirer = Hirer::where('user_id', '=', Auth::id())->first();

        $hirerResource = $hirer->resources()->attach($resource, [
            'order_id' => $order->id,
            'receipt_id' => $receiptId,
            'created_by' => Auth::id(),
            'final_charges' => $finalCharges,
            'monthly' => ($selectedHiringMode == 'Monthly') ? true : false,
            'weekly' => ($selectedHiringMode == 'Weekly') ? true : false,
            'hours' => ($selectedHiringMode == 'Hourly') ? $noOfHours : 0
        ]);

        if (!$hirerResource){
            return response()->json(['order_id' => $order->id]);
        }
        abort(404);
    }
}

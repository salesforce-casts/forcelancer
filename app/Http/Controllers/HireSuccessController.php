<?php

namespace App\Http\Controllers;

use App\Models\HirerResource;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;

class HireSuccessController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $paymentId = $request["razorpay_payment_id"];
        $orderId = $request["razorpay_order_id"];
        //        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        //        $payment = $api->payment->fetch($paymentId);
        $hireResource = HirerResource::where("order_id", $orderId)->first();
        $result = $hireResource->update(["payment_id" => $paymentId]);
        $hireResourceUpdated = $hireResource->refresh();
        $hireResource = HirerResource::find($hireResourceUpdated->id);

        $duration = "";
        if ($hireResource->monthly) {
            $duration = " for " . $hireResource->monthly . " months";
        } elseif ($hireResource->weekly) {
            $duration = " for " . $hireResource->weekly . " weeks";
        } elseif ($hireResource->hourly != null) {
            $duration = " for " . $hireResource->hours . " hours";
        }

        $event = new Event([
            "narration" =>
                "Successfully hired " .
                $hireResource->resource->user->name .
                $duration,
        ]);
        $event->user()->associate(Auth::id());
        $event->createdBy()->associate(Auth::id());
        $event->save();

        return redirect()->route("dashboard");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class HireSuccessController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $paymentId = $request['razorpay_payment_id'];
        $orderId = $request['razorpay_order_id'];
//        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
//        $payment = $api->payment->fetch($paymentId);
        Transaction::where('order_id', $orderId)->update(['payment_id' => $paymentId]);

        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

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
        $resource_id = $request->input('resource_id');
        $resource = Resource::find($resource_id);

        $key_id = env('RAZORPAY_KEY');
        $secret = env('RAZORPAY_SECRET');

        $api = new Api($key_id, $secret);

        $transaction_count = Transaction::count();
        $receipt_id = '#' . str_pad($transaction_count + 1, 8, "0", STR_PAD_LEFT);

        // # TODO: Create a Receipt record in the table and use the id here
        $order = $api->order->create(array('receipt' => $receipt_id, 'amount' => 100, 'currency' => 'INR'));

        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->receipt_id = $order->receipt;
        $transaction->resource()->associate($resource);

        $auth_user = User::find(Auth::user());
        $transaction->hirer()->associate($auth_user);
        $transaction->user()->associate($auth_user);
        $saved = $transaction->save();
        dd($transaction);

        if ($saved) {
            return response()->json(['order_id' => $order->id]);
        }
        abort(404);
    }
}

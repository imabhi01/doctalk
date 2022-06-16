<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Order;
use App\Models\Product;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {  

        $data = $request->all();

        $product = Product::find($request->product_id);

        $data['price'] = $product->price;

        $secretKey = config('services.stripe.secret');

        Stripe\Stripe::setApiKey($secretKey);

        Stripe\Charge::create ([
            "amount" => $product->price,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Testing payment" 
        ]);

        $order = Order::create($data);

        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}

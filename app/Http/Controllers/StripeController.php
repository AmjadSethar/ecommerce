<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\Cart;
class StripeController extends Controller
{
    /**
     * payment view
     */
    // public function handleGet()
    // {
    //     $totalProductAmount = 0;
    //     $carts = Cart::where('user_id',auth()->user()->id)->get();
    //     foreach($carts as $cartItem){
    //           $totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
    //     }
    //     //return $totalProductAmount;
    //     return view('frontend.checkout.stripeCheckout',compact('totalProductAmount'));
    // }
  
    /**
     * handling payment with POST
     */
    // public function handlePost(Request $request)
    // {
    //     $totalProductAmount = 0;
    //     $carts = Cart::where('user_id',auth()->user()->id)->get();
    //     foreach($carts as $cartItem){
    //           $totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
    //     }
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([
    //             "amount" => $totalProductAmount *100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Making test payment.",
                
    //     ]);
  
    //     Session::flash('success', 'Payment has been successfully processed.');
          
    //     return back();
    // }

    public function handlePost(Request $request)
    {
        
        $totalProductAmount = 0;
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($carts as $cartItem){
            $totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
         $totalProductAmount;
        \Stripe\Stripe::setApiKey('sk_test_51MbfijI8Zzyeo1ZfaJs5HRyrMcBowMi53wnbNAYEXDvPljwq85H4oLge2LhKpnY3RBwJzgj6Or1OarsXOz5kw4MP00uWHkqfQ0 ');

        $charge = \Stripe\Charge::create([
            'source' => $_POST['stripeToken'],
            'description' =>  $cartItem->product->small_description,
            'amount' => $totalProductAmount,
            'currency' => 'usd',
           
            ]);
        // foreach($charge as $purchaseDetails){
        //     dd($purchaseDetails['_lastResponse']);
        // }

        dd($charge->billing_details->name);

        
    }
  
}
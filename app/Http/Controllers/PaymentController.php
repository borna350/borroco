<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentStore(Request $request){
        // if (Auth::guard('web')->check()){
        //     $user = Auth::guard('web')->user();
        // }elseif (Auth::guard('dealer')->check()){
        //     $user = Auth::guard('dealer')->user();
        // }else{
        //     $user = Auth::guard('artiest')->user();
        // }
        // dd(Cart::content());
        $user = Auth::user();
        $paymentType = $request->get('payment_type');
        $subTotalAmount = Cart::subtotal();
        $totalAmount = Cart::total();
       
        if($paymentType == 'Paypal'){
             //For Paypal
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_id = $user->shippingAddress->id;
            $order->sub_total_amount = $subTotalAmount;
            $order->total_amount = $totalAmount;
            $order->save();
            $orderId = $order->id;

            $payment = new Payment();
            $payment->order_id = $orderId;
            $payment->payment_type = $paymentType;
            $payment->save();
            $paymentId = $payment->id;

            foreach (Cart::content() as $product){
                $orderDetails = new OrderDetails();
                $orderDetails->shipping_id = $user->shippingAddress->id;
                $orderDetails->order_id = $orderId;
                $orderDetails->payment_id = $paymentId;
                $orderDetails->product_id = $product->id;
                // $orderDetails->admin_id = $product->options->admin_id;
                $orderDetails->product_name = $product->name;
                $orderDetails->product_price = $product->price;
                $orderDetails->product_quantity = $product->qty;
                $orderDetails->save();
            }
            Cart::destroy();
            return redirect('/')->with('success', 'Place your order!');

        }elseif($paymentType == 'Credit Card'){
            //For Credit Card
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_id = $user->shippingAddress->id;
            $order->sub_total_amount = $subTotalAmount;
            $order->total_amount = $totalAmount;
            $order->save();
            $orderId = $order->id;

            $payment = new Payment();
            $payment->order_id = $orderId;
            $payment->payment_type = $paymentType;
            $payment->credit_card_number = $request->credit_card_number;
            $payment->credit_card_expire_date = $request->credit_card_expire_date;
            $payment->credit_card_code = $request->credit_card_code;
            $payment->save();
            $paymentId = $payment->id;

            foreach (Cart::content() as $product){
                $orderDetails = new OrderDetails();
                $orderDetails->shipping_id = $user->shippingAddress->id;
                $orderDetails->order_id = $orderId;
                $orderDetails->payment_id = $paymentId;
                $orderDetails->product_id = $product->id;
                // $orderDetails->admin_id = $product->options->admin_id;
                $orderDetails->product_name = $product->name;
                $orderDetails->product_price = $product->price;
                $orderDetails->product_quantity = $product->qty;
                $orderDetails->save();
            }
            Cart::destroy();
            return redirect('/')->with('success', 'Place your order!');

        }elseif($paymentType == 'Sepa Direct Debit'){
            //For Sepa Direct Debit
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_id = $user->shippingAddress->id;
            $order->sub_total_amount = $subTotalAmount;
            $order->total_amount = $totalAmount;
            $order->save();
            $orderId = $order->id;

            $payment = new Payment();
            $payment->order_id = $orderId;
            $payment->payment_type = $paymentType;
            $payment->sepa_iban = $request->sepa_iban;
            $payment->save();
            $paymentId = $payment->id;

            foreach (Cart::content() as $product){
                $orderDetails = new OrderDetails();
                $orderDetails->shipping_id = $user->shippingAddress->id;
                $orderDetails->order_id = $orderId;
                $orderDetails->payment_id = $paymentId;
                $orderDetails->product_id = $product->id;
                // $orderDetails->admin_id = $product->options->admin_id;
                $orderDetails->product_name = $product->name;
                $orderDetails->product_price = $product->price;
                $orderDetails->product_quantity = $product->qty;
                $orderDetails->save();
            }
            Cart::destroy();
            return redirect('/')->with('success', 'Place your order!');

        }elseif($paymentType == 'Sofort'){
            //For Sofort
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_id = $user->shippingAddress->id;
            $order->sub_total_amount = $subTotalAmount;
            $order->total_amount = $totalAmount;
            $order->save();
            $orderId = $order->id;

            $payment = new Payment();
            $payment->order_id = $orderId;
            $payment->payment_type = $paymentType;
            $payment->save();
            $paymentId = $payment->id;

            foreach (Cart::content() as $product){
                $orderDetails = new OrderDetails();
                $orderDetails->shipping_id = $user->shippingAddress->id;
                $orderDetails->order_id = $orderId;
                $orderDetails->payment_id = $paymentId;
                $orderDetails->product_id = $product->id;
                // $orderDetails->admin_id = $product->options->admin_id;
                $orderDetails->product_name = $product->name;
                $orderDetails->product_price = $product->price;
                $orderDetails->product_quantity = $product->qty;
                $orderDetails->save();
            }
            Cart::destroy();
            return redirect('/')->with('success', 'Place your order!');

        }elseif($paymentType == 'Giropay'){
             //For Giropay
            $order = new Order();
            $order->user_id = $user->id;
            $order->shipping_id = $user->shippingAddress->id;
            $order->sub_total_amount = $subTotalAmount;
            $order->total_amount = $totalAmount;
            $order->save();
            $orderId = $order->id;

            $payment = new Payment();
            $payment->order_id = $orderId;
            $payment->payment_type = $paymentType;
            $payment->save();
            $paymentId = $payment->id;

            foreach (Cart::content() as $product){
                $orderDetails = new OrderDetails();
                $orderDetails->shipping_id = $user->shippingAddress->id;
                $orderDetails->order_id = $orderId;
                $orderDetails->payment_id = $paymentId;
                $orderDetails->product_id = $product->id;
                // $orderDetails->admin_id = $product->options->admin_id;
                $orderDetails->product_name = $product->name;
                $orderDetails->product_price = $product->price;
                $orderDetails->product_quantity = $product->qty;
                $orderDetails->save();
            }
            Cart::destroy();
            return redirect('/')->with('success', 'Place your order!');

        }
        else{
            return redirect()->back()->with('error', 'Select payment option!');
        }
    }
}

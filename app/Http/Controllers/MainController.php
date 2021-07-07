<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Order;
use App\Http\Requests\BuyerRequest;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;

class MainController
{
    const STATUS_ORDER_NOT_PAYED = 0;
    const STATUS_ORDER_PAYED = 1;

    protected static $email = 'test.php.up123@gmail.com';

    public function products()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function checkout($productId)
    {
        $product = Product::where('id', $productId)->first();
        return view('checkout', compact('product'));
    }

    public function payment(BuyerRequest $request)
    {
        $order = new Order;
        $order->client_name = $request->client_name;
        $order->client_address = $request->client_address;
        $order->total_product_value = $request->total_product_value;
        $order->total_shipping_value = $request->total_shipping_value;
        $order->product_id = $request->product_id;
        $order->status = static::STATUS_ORDER_NOT_PAYED;
        $order->save();

        $order_id = $order->id;
        $price = Product::where('id', $request->product_id)->first()->price;
        $sum = (int) $request->total_product_value * (int) $price + (int) $request->total_shipping_value;

        return view('payment', compact('sum', 'request', 'order_id'));
    }

    public function order(PaymentRequest $request)
    {

        $order = Order::where('id', $request->order_id)->first();
        $order->status = static::STATUS_ORDER_PAYED;
        $order->save();

        $product = Product::where('id', $order->product_id)->first();

        Mail::to(static::$email)->send(new OrderCreated($order, $product));

        return view('thanks');
    }
}

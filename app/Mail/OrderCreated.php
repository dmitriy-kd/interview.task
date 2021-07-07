<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $product;

    /**
     * OrderCreated constructor.
     * @param $name
     */
    public function __construct($order, $product)
    {
        $this->order = $order;
        $this->product  = $product;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch($this->order->total_shipping_value) {
            case 0:
                $deliveryStatus = 'Бесплатная';
                break;
            case 10:
                $deliveryStatus = 'Платная';
                break;
        }

        $orderId = $this->order->id;
        $orderAddress = $this->order->client_address;
        $orderName = $this->order->client_name;
        $productCount = $this->order->total_product_value;
        $productName = $this->product->name;
        $productPrice = $this->product->price;

        return $this->view('order_created', [
            'orderId' => $orderId,
            'orderAddress' => $orderAddress,
            'orderName' => $orderName,
            'productCount' => $productCount,
            'productName' => $productName,
            'productPrice' => $productPrice,
            'deliveryStatus' => $deliveryStatus,
        ]);
    }
}

<?php

namespace App\Service;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Subscription;

class OrderService
{
    static function storeOrder(string $transaction_id, int $buyer_id, string $status, float $total_amount, float $paid_amount, string $currency, string $payment_method)
    {
        try {
            $order = new Order();
            $order->invoice_id = uniqid();
            $order->buyer_id = $buyer_id;
            $order->status = $status;
            $order->total_amount = $total_amount;
            $order->paid_amount = $paid_amount;
            $order->currency = $currency;
            $order->payment_method = $payment_method;
            $order->transaction_id = $transaction_id;
            $order->save();

            /** store order items */
            $cart = Cart::where('user_id', $buyer_id);
            $cartItems = $cart->get();
            foreach ($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->album->discount ?? $item->album->price;
                $orderItem->album_id = $item->album->id;
                $orderItem->commission_rate = config('settings.commission_rate');
                $orderItem->save();

                /** store subscription */
                $subscription = new Subscription();
                $subscription->user_id = $buyer_id;
                $subscription->album_id = $item->album->id;
                $subscription->artist_id = $item->album->artist_id;
                $subscription->save();
                /** add commission to artist wallet */
                $artistWallet = $item->album->artist;
                $artistWallet->wallet += calculateCommission($item->album->discount ?? $item->album->price, config('settings.commission_rate'));
                $artistWallet->save();
            }



            /** delete cart items */
            $cart->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

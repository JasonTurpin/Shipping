<?php
namespace App\Http\Controllers;
use App\Order, App\ShoppingCart;

class APIController extends Controller {
    // Fetches information about an order
    public function do_orderInfo($sourceOrderNumber) {
        // Initialize items
        $return['order'] = new Order;
        $return['cart']  = new ShoppingCart;

        // Attempt to fetch order
        $order = Order::sourceOrderNumber($sourceOrderNumber);

        // IF order exists, fetch cart and update return array
        if (is_a($order, 'App\Order')) {
            $return['order'] = $order;
            $return['cart']  = $order->cart;
        }

        // Returns as JSON object
        return $return;
    }
}

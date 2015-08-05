<?php
namespace App\Http\Controllers;
use App\Order, App\ShoppingCart, App\BoxType, Request;

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

    // Fetches box code information
    public function do_boxCode($code) {
        return array(
            'type' => BoxType::code($code),
        );
    }

    // Calculates the lowest rate
    public function do_refreshRates() {
        // IF user submitted form
        return $this->_processShipping();
    }

    // Process shipping information
    protected function _processShipping() {
        // Required Values
        $requiredValues = array('Length', 'Width', 'Height', 'Weight', 'Packer', 'NumTrees',
            'ShipName', 'ShipAddress', 'ShipCity', 'ShipState', 'ShipZip', 'Phone'
        );

        // All variables passed
        $request = Request::all();

        // Array of missing fields
        $return['errorFields'] = array();
        foreach ($requiredValues as $val) {
            if (empty($request[$val])) {
                $return['errorFields'][] = $val;
            }
        }

        // IF fields are missing
        if (!empty($return['errorFields'])) {
            return $return;
        }

        // Connect to API
        \EasyPost\EasyPost::setApiKey(config('app.easyPostAPIKey'));

        $toData = array(
            "name"    => $request['ShipName'],
            "street1" => $request['ShipAddress'],
            "street2" => $request['ShipAddress2'],
            "city"    => $request['ShipCity'],
            "state"   => $request['ShipState'],
            "zip"     => $request['ShipZip'],
            "phone"   => $request['Phone']
        );
        $toAddress = \EasyPost\Address::create($toData);

        // Build from address object
        $fromData = array(
            "company" => config('app.fromCompany'),
            "street1" => config('app.fromStreet1'),
            "city"    => config('app.fromCity'),
            "state"   => config('app.fromState'),
            "zip"     => config('app.fromZip'),
        );
        $fromAddress = \EasyPost\Address::create($fromData);

        // Build parcel object
        $parcelData = array(
            "length" => $request['Length'],
            "width"  => $request['Width'],
            "height" => $request['Height'],
            "weight" => $request['Weight'],
        );
        $parcel = \EasyPost\Parcel::create($parcelData);

        // Create shipment object
        $shipment = \EasyPost\Shipment::create(
            array(
                "to_address"   => $toAddress,
                "from_address" => $fromAddress,
                "parcel"       => $parcel
            )
        );

        return $shipment->lowest_rate();
    }
}

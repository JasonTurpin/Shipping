if (typeof App === 'undefined') {
    var App = {};
}

App.Logic = (function() {
    var obj = {
        // Initialize
        init: function() {
            var self = this;

            // Order number was updated, update customer fields
            $('[name="scanOrderNumber"]').on('blur', self._processOrderNumber);
        },

        // Sends the AJAX call processing the order numer
        _processOrderNumber: function() {
            $.ajax({
                url: "/api/orderInfo/" + $('[name="scanOrderNumber"]').val(),
                dataType: 'json',
                success: function(data) {
                    // Detect Bad data
                    if (typeof data.order === 'undefined' && !$.isPlainObject(data.order) || $.isEmptyObject(data.order)) {
                        // @todo replace with an error message
                        console.log('bad data');

                        return;
                    }

                    try {
                        // Set Order
                        var order = data.order;

                        // Set Values
                        $('[name="ShipName"]').val(order.ShipName);
                        $('[name="ShipAddress"]').val(order.ShipAddress);
                        $('[name="ShipAddress2"]').val(order.ShipAddress2);
                        $('[name="ShipCity"]').val(order.ShipCity);
                        $('[name="ShipState"]').val(order.ShipState);
                        $('[name="ShipZip"]').val(order.ShipZip);
                        $('[name="Phone"]').val(order.Phone);

                        // Set Cart
                        var cart = data.cart;

                        // Set Cart Values
                        $('[name="CartName"]').val(cart.CartName);

                    // An exception occurred, display error
                    } catch (e) {
                        // @todo convert to error message
                        console.log('an error occurred');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // @todo display an error
                    console.log('an error occurred');
                }
            });
            
        }
    };

    $(document).ready(function() {
        obj.init();
    });
    return obj;
}());

if (typeof App === 'undefined') {
    var App = {};
}

App.Logic = (function() {
    var obj = {
        // Initialize
        init: function() {
            var self = this;

            // Removes all error classes
            $('.has-error :text').on('keydown', function() {
                $(this).closest('.form-group').removeClass('has-error');
            });

            // Removes error class on radio button click
            $('.has-error :radio').on('click', function() {
                $(this).closest('.form-group').removeClass('has-error');
            });

            // Remove error classes on select boxes on change
            $('.has-error select').on('change', function() {
                $(this).closest('.form-group').removeClass('has-error');
            });

            // Order number was updated, update customer fields
            $('[name="scanOrderNumber"]').on('blur', self._processOrderNumber);

            $('#resetForm').on('click', self._resetForm);
        },

        // Reset form values
        _resetForm: function() {
            $('input:text').val('');
            $('select').val('default');
        },

        // Sends the AJAX call processing the order numer
        _processOrderNumber: function() {
            // Clear errors
            showErrors([]);

            // Create selector (more efficient)
            var orderNumSel = $('[name="scanOrderNumber"]');

            $.ajax({
                url: "/api/orderInfo/" + $(orderNumSel).val(),
                dataType: 'json',
                success: function(data) {
                    // Detect Bad data
                    if (typeof data.order === 'undefined' && !$.isPlainObject(data.order) || $.isEmptyObject(data.order)) {
                        // Add errors
                        $(orderNumSel).closest('form-control').addClass('has-error');
                        showErrors(['You have entered an invalid value.']);

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
                        showErrors(['An error occurred.']);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $(orderNumSel).closest('form-control').addClass('has-error');
                    showErrors(['You have entered an invalid value.']);
                }
            });
            
        }
    };

    $(document).ready(function() {
        obj.init();
    });
    return obj;
}());

// Displays error messaging
function showErrors(errorMsgs) {
    var html = '';

    $.each(errorMsgs, function(dontCare, value) {
        html += '<li>' + value + '</li>';
    });

    // Display error messages
    $('#errorMessages').html(html);
    
    if (html !== '') {
        $('#errorContainer').removeClass('hoffa');
    } else {
        $('#errorContainer').addClass('hoffa');
    }
}

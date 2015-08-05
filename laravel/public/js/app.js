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

            // Box Code was updated, process it
            $('[name="BoxCode"]').on('blur', self._processBoxCode);

            // reset the form
            $('#resetForm').on('click', self._resetForm);

            // Refresh the shipping rates
            $('#refreshRates').on('click', self._refreshRates);

            // Disable the enter key for form submits
            $('#formContainer').on('keyup keypress', function(e) {
                var code = e.keyCode || e.which;
                if (code === 13) {
                    e.preventDefault();
                    return false;
                }
            });
        },

        // Refresh the shipping rates
        _refreshRates: function() {
            // Clear errors
            showErrors([]);

            var postData = {
                '_token'      : $('[name="_token"]').val(),
                'Length'      : $('[name="Length"]').val(),
                'Width'       : $('[name="Width"]').val(),
                'Height'      : $('[name="Height"]').val(),
                'Weight'      : $('[name="Weight"]').val(),
                'Packer'      : $('[name="Packer"]').val(),
                'NumTrees'    : $('[name="NumTrees"]').val(),
                'ShipName'    : $('[name="ShipName"]').val(),
                'ShipAddress' : $('[name="ShipAddress"]').val(),
                'ShipAddress2': $('[name="ShipAddress2"]').val(),
                'ShipCity'    : $('[name="ShipCity"]').val(),
                'ShipState'   : $('[name="ShipState"]').val(),
                'ShipZip'     : $('[name="ShipZip"]').val(),
                'Phone'       : $('[name="Phone"]').val()
            };

            // Send Ajax
            $.ajax({
                url: "/api/refreshRates",
                type: 'POST',
                data: postData,
                dataType: 'json',
                success: function(data) {
                    // @todo provide positive user feedback
                    console.log(data);

                    // Detect Bad data
                    if (typeof data.errorFields !== 'undefined' && data.errorFields.length > 0) {
                        $(data.errorFields).each(function(dontCare, value) {
                            $('[name="value"]').closest('.form-group').addClass('has-error');
                        });

                        showErrors(['Required fields are missing.']);

                        return;
                    }

                    try {

                    // An exception occurred, display error
                    } catch (e) {
                        showErrors(['An error occurred.']);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    showErrors(['An error occurred.']);
                }
            });
            
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
                        $(orderNumSel).closest('.form-group').addClass('has-error');
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

                        // Give the focus to the next form element
                        $('[name="BoxCode"]').focus();

                    // An exception occurred, display error
                    } catch (e) {
                        showErrors(['An error occurred.']);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $(orderNumSel).closest('.form-group').addClass('has-error');
                    showErrors(['You have entered an invalid value.']);
                }
            });
        },

        // Processes an update in the box code field
        _processBoxCode: function() {
            // Clear errors
            showErrors([]);

            // Create selector (more efficient)
            var boxCode = $('[name="BoxCode"]');

            $.ajax({
                url: "/api/boxCode/" + $(boxCode).val(),
                dataType: 'json',
                success: function(data) {
                    // Detect Bad data
                    if (typeof data.type === 'undefined' && !$.isPlainObject(data.type) || $.isEmptyObject(data.type)) {
                        // Add errors
                        $(boxCode).closest('.form-group').addClass('has-error');
                        showErrors(['You have entered an invalid box code.']);

                        return;
                    }

                    try {
                        // Set Order
                        var type = data.type;

                        // Set Values
                        $('[name="Length"]').val(type.Length);
                        $('[name="Width"]').val(type.Width);
                        $('[name="Height"]').val(type.Height);

                        // Switch to next element
                        $('[name="Weight"]').focus();


                    // An exception occurred, display error
                    } catch (e) {
                        showErrors(['An error occurred.']);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $(boxCode).closest('.form-group').addClass('has-error');
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

// Displays error messagingf
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

$j(document).ready(function() {
    carts.init();
    productReview.init();
    users.init();
});
var users = {
    init: function() {
        $j('#user-signin').submit(function(event) {
            users.signin();
            return false;
        });
        $j('#user-signup').submit(function(event) {
            users.signup();
            return false;
        });
    },
    signup: function() {
        $j.ajax({
            type: 'post',
            url: base_url + '/login/signup',
            data: $j('form#user-signup').serialize(),
            dataType: 'json',
            success: function(jsonData) {
                if (jsonData.success === false) {
                    alert(jsonData.msg);
                    $j('.form-control').addClass('alert-danger');
                } else {
                    window.location.href = jsonData.redirect_url;
                }
            },
            error: function(a, b, c) {
                alert("signup Error: " + a + ' ' + b + ' ' + c);
            }
        });
    },
    signin: function() {
        $j.ajax({
            type: 'post',
            url: base_url + '/login/signin',
            data: $j('form#user-signin').serialize(),
            dataType: 'json',
            success: function(jsonData) {
                console.log(jsonData);
                if (jsonData.success === false) {
                    $j('.form-control').addClass('alert-danger');
                } else {
                    window.location.href = jsonData.redirect_url;
                }
            },
            error: function(a, b, c) {
                alert("signin Error: " + a + ' ' + b + ' ' + c);
            }
        });
    }
}
var productReview = {
    init: function() {
        $j('#review-form-submit').submit(function(event) {
            productReview.addReview(this);
            return false;
        });
    },
    addReview: function(obj) {
        $j.ajax({
            type: 'post',
            url: base_url + '/products/addReview',
            data: $j('form#review-form-submit').serialize(),
            dataType: 'json',
            success: function(jsonData) {
                if (jsonData.success === false) {
                    $j('.alert').addClass('alert-danger');
                    $j('.alert').html("Please fillup all input value.");
                } else {
                    $j('.alert').html(jsonData.success);
                }
            },
            error: function(a, b, c) {
                alert("addToCart Error: " + a + ' ' + b + ' ' + c);
            }
        });
    }
}
var carts = {
    init: function() {
        $j('.add-to-cart').on('click', function() {
            carts.addToCart(this);
        });
        $j('.remove-from-cart').on('click', function() {
            carts.removeFromCart(this);
        });
        $j('.quantity-value-change').change(function() {
            carts.quantityChange(this);
        });

    },
    addToCart: function(obj) {
        var product_id = $j(obj).val();
        var quantity = 1;
        var product_name = $j(obj).attr('title');
        var product_image = $j(obj).attr('rel');
        var price = parseFloat($j(obj).data('price'));
        var tPrice = parseFloat($j('#cart-amount').attr('rel'));
        var totalPrice = price + tPrice;
        var rPrice = $j(obj).data('rprice');

        $j.ajax({
            type: 'post',
            url: base_url + '/carts/addToCart',
            data: {
                product_id: product_id,
                quantity: quantity,
                product_name: product_name,
                product_image: product_image,
                product_price: price,
                product_regular_price: rPrice
            },
            dataType: 'json',
            success: function(jsonData) {
                $j('.shopping-cart-list').append(jsonData.dataString);
                $j('#cart-quantity').html(jsonData.quantity);
                $j('#cart-quantity').addClass('qty');
                $j('#cart-amount').attr('rel', totalPrice)
                $j('#cart-amount').html('&#2547; ' + totalPrice);
            },
            error: function(a, b, c) {
                alert("addToCart Error: " + a + ' ' + b + ' ' + c);
            }
        });
    },
    removeFromCart: function(obj) {
        var product_id = $j(obj).val();
        $j.ajax({
            type: 'post',
            url: base_url + '/carts/removeFromCart',
            data: {
                product_id: product_id
            },
            dataType: 'json',
            success: function(jsonData) {
                $j('.product-details-' + jsonData.product_id).html("");
                $j('#cart-quantity').html(jsonData.quantity);
                $j('#cart-amount').attr('rel', jsonData.quantity)
                $j('#cart-amount').html('&#2547; ' + jsonData.totalAmount);
                return false;
            },
            error: function(a, b, c) {
                alert("addToCart Error: " + a + ' ' + b + ' ' + c);
            }
        });

    },
    quantityChange: function(obj) {
        var quantity = $j(obj).val();
        if (quantity > 1) {
            var product_id = $j(obj).attr('title');
            var previous_quantity = $j(obj).attr('rel');
            $j.ajax({
                type: 'post',
                url: base_url + '/carts/quantityChange',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    prev_quantity: previous_quantity
                },
                dataType: 'json',
                success: function(jsonData) {
                    if (jsonData.productTotal) {
                        $j('.product-total-' + jsonData.product_id).html("<strong class=\"primary-color\">&#2547; " + jsonData.productTotal + "</strong>");
                    }
                    $j(obj).attr('rel', quantity)
                    $j('#cart-quantity').html(jsonData.quantity);
                    $j('#cart-amount').attr('rel', jsonData.quantity)
                    $j('#cart-amount').html('&#2547; ' + jsonData.totalAmount);
                    return false;
                },
                error: function(a, b, c) {
                    alert("addToCart Error: " + a + ' ' + b + ' ' + c);
                }
            });
        }
    }
}


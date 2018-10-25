$j(document).ready(function() {
//    $j('#parentCategory').select2();
    categories.init();
    orders.init();

});
var orders = {
    init: function() {
        $j('#deliveryModal').on('show.bs.modal', function(event) {
            orders.loadOrder(this, event);
        });
        $j('#order-update').submit(function(event) {
            orders.updateOrder();
            return false;
        });
    },
    loadOrder: function(obj, event) {
        var button = $j(event.relatedTarget);
        var recipient = button.data('whatever');
        var modal = $j(obj);
        modal.find('.order-id').val(recipient.order_id);
        modal.find('.order-by').html("<strong>" + recipient.user_full_name + "</strong><br>" + recipient.user_address + "<br />Phone: " + recipient.user_phone + "<br />");
        modal.find('.invoice-data').html("<b>Invoice #" + recipient.order_id + "</b><br><b>Order ID:</b> " + recipient.order_transaction_id + "<br><b>Payment Due:</b> " + recipient.order_date + "<br>"+ "<b>Amount:</b> &#2547; " + recipient.total_amount);
    },
    updateOrder: function() {
        $j.ajax({
            type: 'post',
            url: base_url + '/orders/updateOrder',
            data: $j('form#order-update').serialize(),
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
    }
}
var categories = {
    init: function() {
        $j('#parentCategory').on('change', function() {
            categories.subCategory(this);
        });
    },
    subCategory: function(obj) {
        var category = $j(obj).val();
        $j.ajax({
            type: 'post',
            url: base_url + '/categories/loadSubCategory',
            data: {
                category: category
            },
            dataType: 'json',
            success: function(jsonData) {
                if (jsonData.success === true) {
                    var options = '<option  value="0:No Sub Category">No Sub Category</option>';
                    for (var i = 0; i < jsonData.subcategories.length; i++) {
                        var catRow = jsonData.subcategories[i];
                        options += '<option  value="' + catRow.category_id + ':' + catRow.category_name + '">' + catRow.category_name + '</option>';
                        console.log(catRow.category_name);
                    }
                    $j("#subCategory").html(options);
                } else {
                    alert(jsonData.msg);
                }
            },
            error: function(a, b, c) {
                alert("loadSubcategory Error: " + a + ' ' + b + ' ' + c);
            }
        });
    }
}
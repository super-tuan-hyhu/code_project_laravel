// Delete Counter
function removeCart(rowId){
    $.ajax({
        type: "GET",
        url: "dashboard/counter/delete",
        data: {
            rowId : rowId,
        },

        success: function (response){
            var cart_tbody = $('.counter .counterCart');
            var cart_exitsItem = cart_tbody.find("div[data-rowId='"+ rowId +"']");
            cart_exitsItem.remove();

            $('.cart-total').text('$' + response['total']);
            $('.cart-subtotal').text('$' + response['total']);
            $('.underline').text('Shopping Cart' + response['count']);
            alert('Delete Products In Cart Success! Name Products : ' + response['cart'].name);
            console.log(response);
        },

        error: function (response) {
            alert('Delete Products In Cart Fail');
            console.log(response);
        }

    });

    return false;
}

// Delete All Counter
function destroy() {
    $.ajax({
       type: "GET",
       url: "dashboard/counter/destroy",
       data: {},
        success: function (response){
            var cart_tbody = $('.counter .counterCart');
            cart_tbody.children().remove();
            $('.cart-total').text('$' + response['total']);
            $('.cart-subtotal').text('$' + response['total']);
            $('.underline').text('Shopping Cart' + response['count']);
        },
        error: function (response) {
            alert('Delete All Products In Cart Fail');
            console.log(response);
        },
    });

    return false;
}

// Update Counter
function updateCounter(rowId, qty){
    $.ajax({
        type: "GET",
        url: "dashboard/counter/update",
        data: {
            rowId: rowId,
            qty: qty,
        },
        success: function (response){
            var cart_tbody = $('.counter .counterCart');
            var cart_exitsItem = cart_tbody.find("div[data-rowId='"+ rowId +"']");

            if (qty === 0){
                cart_exitsItem.remove();
            }else {
                cart_exitsItem.find('.products-line-price').text(  response['cart'].price * response['cart'].qty);
                $('.cart-total').text('$' + response['total']);
                $('.cart-subtotal').text('$' + response['total']);
                $('.underline').text('Shopping Cart' + '(' + response['count'] + ')');
            }

            alert('Update success');
        },
        error: function (response){
            alert('Fail');
            console.log(response)
        }
    });

    return false;
}


/// Mã Giảm Giá
function coupon() {
    let coupon = document.getElementById('coupon_code').value.trim();
    console.log(coupon);

    $.ajax({
        type: "GET",
        url: "dashboard/counter/coupon",
        data: {
            coupon: coupon,
        },

        success: function (response) {
            console.log(response);
            if (response.success) {
                $('.cart-discount').text(response.discount + '%');
                $('.cart-total').text('$' + response.final_price);
                $('input[name="total"]').val(response.final_price);
                alert('Apply Coupon Success');
            }
        },
        error: function (response) {
            alert('Fail');
            console.log(response);
        }
    });
}




// Tính Tiền Counter Khi chọn Loại Sản Phẩm

let lastShippingCost = 0; // Biến lưu phí giao hàng trước đó

function counterDriver() {
    let cartTotal = parseFloat($('input[name="total"]').val()) - lastShippingCost;
    let shippingCounter = parseFloat($('input[name="shippingDelivery"]:checked').data('shipping-cost')); // || 0
    let final_price = cartTotal + shippingCounter;

    $('.cart-total').text('$' + final_price);
    $('input[name="total"]').val(final_price);
    $('.cart-shipping').text('$' + shippingCounter);

    lastShippingCost = shippingCounter;

    $.ajax({
        type: "GET",
        url: "dashboard/counter/updateTotal",
        data: {
            total: final_price,
        },
        success: function (response) {
            console.log('Total updated in session:', response);
        },
        error: function (xhr) {
            console.error('Failed to update total in session:', xhr);
        }
    });
}



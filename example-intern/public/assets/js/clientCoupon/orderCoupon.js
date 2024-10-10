function orderCoupon(){
    let coupon = document.getElementById('clientCoupon').value.trim();
    console.log(coupon)
    $.ajax({
        type: "GET",
        url: "client/order/coupon",
        data: {
            coupon: coupon,
        },

        success: function (response){
            console.log(response)

            if (response.success) {
                $('.cart-discount').text('-$' + response.discount);
                $('.cart-discount-amount').text('$' + response.final_total);
                $('input[name="total_amount"]').val(response.final_total);
                alert('Apply Coupon Success');
            }
        }
    });
}

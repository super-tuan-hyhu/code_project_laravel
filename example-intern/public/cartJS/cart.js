// $(document).on('submit', 'form', function(e) {
//     e.preventDefault(); // Ngăn không cho form gửi request trực tiếp
//     var product_id = $('input[name="product_id"]').val();
//     var color_id = $('a.color .checkA').parent().data('color'); // Lấy màu được chọn
//     var size_id = $('input[name="size_id"]:checked').val(); // Lấy size được chọn
//     var quantity = $('#numberCounter').val(); // Lấy số lượng
//
//     // Kiểm tra xem người dùng đã chọn màu và kích thước chưa
//     if (!color_id  || !size_id) {
//         alert('Vui lòng chọn màu và kích thước trước khi thêm vào giỏ hàng.');
//         return false;
//     }
//
//     $.ajax({
//         type: "POST",
//         url: "../client/cart/cart/" + product_id,
//         data: {
//             product_id: product_id,
//             color_id: color_id,
//             size_id: size_id,
//             quantity: quantity,
//             _token: '{{ csrf_token() }}' // Thêm CSRF token vào request
//         },
//         success: function (response) {
//             alert('Add Cart Success');
//             // Xử lý nếu bạn muốn cập nhật giỏ hàng hoặc hiển thị thông báo thêm thành công
//         },
//         error: function(xhr) {
//             alert('Something went wrong!');
//         }
//     });
// });



    // Nút tăng số lượng
    // $('.plus-value').on('click', function() {
    //     var input = $(this).siblings('input');
    //     var cartDetail = input.data('cart-id');
    //     var productId = input.data('product-id');
    //     var currentValue = parseInt(input.val());
    //
    //     if (currentValue < input.attr('max')) {
    //         var newValue = currentValue + 1;
    //         input.val(newValue);
    //         updateCart(cartDetail, productId, newValue);
    //     }
    // });
    //
    //
    //
    // // Nút giảm số lượng
    // $('.minus-value').on('click', function() {
    //     var input = $(this).siblings('input');
    //     var cartDetail = input.data('cart-id');
    //     var productId = input.data('product-id');
    //     var currentValue = parseInt(input.val());
    //
    //     if (currentValue > 0) {
    //         var newValue = currentValue - 1;
    //         input.val(newValue);
    //         updateCart(cartDetail, productId, newValue);
    //     }
    // });

    function updateCart(cartDetail, quantity) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: 'client/cart/update/' + cartDetail,
            data: {
                quantity: quantity,
                cartDetail: cartDetail
            },
            success: function(response) {
                $('.cart-total-db').text('$' + response.total_amount);
                $('.products-line-price').text(response.totalResponse);
                alert('Cập nhật giỏ hàng thành công!');
            },
            error: function(response) {
                console.log(response)
                alert('Cập nhật giỏ hàng thất bại! Vui lòng thử lại.');
            }
        });
        return false;
    }




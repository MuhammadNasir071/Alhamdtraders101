
    $('#cart_minus_btn').click(function(){
        var cart_value = $('#seleted_product_quantity').val();
        cart_value++;
        $('#seleted_product_quantity').val(cart_value);
    });

    $('#cart_plus_btn').click(function(){
        var cart_value = $('#seleted_product_quantity').val();
        cart_value--;
        $('#seleted_product_quantity').val(cart_value);
    });

    $('#add_to_cart').click(function(){
        $('.cart_message').remove();
        var data = new FormData();
        if($('#seleted_product_quantity').val() < 1){
            $('.bottom_cart_dev').after('<span class="cart_message" style="color:red">Please select at least 1 quantity of product.</span>');
            return false;
        }
        data.append('quantity',  $('#seleted_product_quantity').val());
        data.append('product_id',  $('#product_id').val());

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '/add-to-cart',
            type: "POST",
            contentType: false,
            processData: false,
            data: data,

            success: function (response) {
                if(response.statusCode == 200){
                    var url = '/cart_view/'+response.product_id+'/'+response.quantity;
                    window.location.replace(url);
                }

            }
        });
    });






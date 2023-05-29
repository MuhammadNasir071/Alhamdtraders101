api['storeProduct'] = ajax_path + '/admin/store_product';
api['updateProduct'] = ajax_path + '/admin/update_product/:id';
api['getSubCategories'] = ajax_path + '/admin/sub_category/:id';

var add_product_btn = $('#add_product_btn');
var update_product_btn = $('#update_product_btn');

// CREATE & EDIT PRODUCT TEXTAREA EDITOR
tinymce.init({
    selector: '#description',
    plugins: 'code table lists',
    toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    setup: function (editor) {
        editor.on('Change', function (e) {
            tinyMCE.triggerSave();
        });
    }
});

// ADD products
$('body').on('submit', '#add_product_form', function(e){
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var files = $('#upload-photo')[0].files;
    if (files.length > 0) {
        data.append('image', files[0]);
    }
    data.append('title', $('#title').val());
    data.append('min_price', $('#min_price').val());
    data.append('max_price', $('#max_price').val());
    data.append('weight_unit', $('#weight_unit').val());
    data.append('description', $('#description').val());
    data.append('shipping_type', $('#shipping_type').val());

    if($('#child_category').val() == null || $('#child_category').val() == ''){
        data.append('category', $('#parent_category').val());
    }
    else{
        data.append('category', $('#child_category').val());
    }
    var is_available = 0;
    if ($('#is_available').is(":checked")) {
        is_available = 1;
    }
    data.append('is_available', is_available);
    data.append('_method', 'POST');
    button_status(add_product_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api["storeProduct"],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_product_btn, false);
                    window.location.replace('/admin/products');
                }, 1500);
            }
            else {
                button_status(add_product_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {

            $('.validation_message').remove();

            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="validation_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(add_product_btn, false);
            }, 1000);
        }
    });
});


// Update products
$('body').on('submit', '#update_product_form', function(e){
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var files = $('#upload-photo')[0].files;
    if (files.length > 0) {
        data.append('image', files[0]);
    }
    data.append('title', $('#title').val());
    data.append('min_price', $('#min_price').val());
    data.append('max_price', $('#max_price').val());
    data.append('weight_unit', $('#weight_unit').val());
    data.append('description', $('#description').val());
    data.append('shipping_type', $('#shipping_type').val());

    var is_available = 0;
    if ($('#is_available').is(":checked")) {
        is_available = 1;
    }
    data.append('is_available', is_available);
    data.append('_method', 'POST');
    let remove_id = _this.data('id');
    let url = api["updateProduct"];
    url = url.replace(":id", remove_id);
    button_status(update_product_btn, true, 'Updating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(update_product_btn, false);
                    window.location.replace('/admin/products');
                }, 1000);
            }
            else {
                button_status(update_product_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {

            $('.validation_message').remove();

            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="validation_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(update_product_btn, false);
            }, 1000);
        }
    });
});


var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};


// // GET subCategories
$('body').on('change', '.category', function (e) {
    var _this = $(this);
    var value = $('#parent_category').val();

    if (_this.val() > 0) {
        var url = api['getSubCategories'].replace(':id', value);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url,
            type: "GET",
            success: function (response) {
                if (response.responseCode == 200) {
                    let subCategories = response.payload.data.subCategories;
                    if (subCategories.length > 0)
                    {
                        $('#child_category').empty();
                        $('#child_category_div').show();
                        subCategories.forEach(function(subCategory) {
                            var element = `<option value="${subCategory.id}"> ${subCategory.name} </div>`;
                            $('#child_category').append(element);
                          });
                    }
                    else{
                        $('#child_category').empty();
                        $('#child_category_div').css('display', 'none');
                    }
                }
                else {
                    // button_status(submit_btn, "reset");
                    toastr.error('There are something went wrong');
                }
            }
        });
    }

});

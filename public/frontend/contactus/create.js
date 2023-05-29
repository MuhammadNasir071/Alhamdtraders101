api['contactUs'] = ajax_path + '/contactus';

var contactUs_btn = $('#contact_btn');
alert('daffda');
// ADD Contact us
$('body').on('submit', '#contactus_form_front', function (e) {
    e.preventDefault();
    var _this = $(this);

    var data = new FormData();

    data.append('name', $('#name').val());
    data.append('start_date', $('#start_date').val());
    data.append('end_date', $('#end_date').val());
    data.append('_method', 'Post');
    button_status(contactUs_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api["contactUs"],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(contactUs_btn, false);
                    // window.location.reload();
                }, 1500);
            }
            else {
                button_status(contactUs_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {
            $('.error_message').remove();
            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                // you can loop through the errors object and show it to the user
                // display errors on each form field
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="error_message"><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(contactUs_btn, false);
            }, 1000);
        }
    });
});


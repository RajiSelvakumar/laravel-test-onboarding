$(document).ready(function () {

    $(function () {
        $("#signup").click(function (e) {
            e.preventDefault();

            var data = {
                'fname': $('.fname').val(),
                'lname': $('.lname').val(),
                'email': $('.email').val(),
                'contact': $('.contact').val(),
                'date': $('.date').val(),
                'password': $('.password').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: 'register-user',
                data: data,
                dataType: "json",
                success: function (feedback) {
                    if (feedback.status == false) {
                        $('#saveform_errlist').html("");
                        $('#saveform_errlist').addClass('alert alert-danger');
                        $.each(feedback.errors, function (key, err_values) {
                            $('#saveform_errlist').append('<li>' + err_values + '</li>')
                        });
                    }else{
                        alert('Registration Successful');
                        window.location='login';
                    }
                                       
                    

                }
            });
        })
    })


})
$("#toggle").change(function () {
    if ($(this).is(':checked')) {
       $("#form_password").attr("type", "text");
       $("#toggleText").text("Hide");
    } else {
       $("#form_password").attr("type", "password");
       $("#toggleText").text("Show");
    }

 });

 $(window).bind("pageshow", function() {
    var form = $('form');
    form[0].reset();
 });
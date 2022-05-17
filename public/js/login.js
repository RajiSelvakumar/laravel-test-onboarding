$(document).ready(function () {
    $(function () {
        $("#login").click(function (e) {
            e.preventDefault();

            
            var data = {
                'email': $('.email').val(),
                'password': $('.password').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $.ajax({
                    url: 'login-user',
                    type: "POST",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 400) {
                            $('#logform_errlist').html("");
                            $('#logform_errlist').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_values) {
                            $('#logform_errlist').append('<li>' + err_values + '</li>')
                            });
                        } else {
                            window.location.href='dashboard';
                        }

                    }
                });
            
        });
    })
})
$("#logtoggle").change(function () {
    if ($(this).is(':checked')) {
       $("#password").attr("type", "text");
       $("#logtoggleText").text("Hide");
    } else {
       $("#password").attr("type", "password");
       $("#logtoggleText").text("Show");
    }

 });

 $(window).bind("pageshow", function() {
    var form = $('form');
    form[0].reset();
 });
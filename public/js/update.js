$(document).ready(function(){
    $(function(){
        $("#update").click(function (e) {
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
                type: "PUT",
                url: '/update-user',
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#upform_errlist').html("");
                        $('#upform_errlist').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#upform_errlist').append('<li>' + err_values + '</li>')
                        });
                    } else if(response.status == 200) {
                        alert("Updated Successfully");
                        window.location = '/dashboard';
                    }

                }
            });
        })
    })
})
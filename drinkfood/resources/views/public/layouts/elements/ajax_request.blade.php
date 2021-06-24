<script>
    /* Begin: Function ajax request forgot password */
    $('#forgot_password').on("click", function (e) {
        e.preventDefault();

        $('.background_loading').css('display','block');

        var regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var email = $("#reset_password_form input[name=email]").val();

        if(email != ""){
            if(regex_email.test(email) == true)
            {
                $.ajax({
                method: "POST",
                url: "{{route('forgot_password.store')}}",
                dataType:"text",
                data: {
                    '_token':'{{csrf_token()}}',
                    'email':email
                }
                }).done(function( msg ) {
                    window.location.href = msg;
                });
            }else{
                alert("{{trans('message.err_email2')}}");
            }
        }else{
            alert("{{trans('message.err_email1')}}");
        }
        
        
    });
    /* End: Function ajax request forgot password */

</script>
<script>
    /* Begin: Check validate form */
$(document).ready(function(){
    $("#regist_form").validate({
        rules: {
			"fullname": {
				required: true,
			},
			"gender": {
				required: true
			},
            "birthday": {
				required: true
			},
            "phone": {
				required: true,
                phone: true
			},
            "email": {
				required: true,
                email: true
			},
            "address": {
				required: true,
			},
            "username": {
				required: true,
                minlength: 8,
                maxlength: 15
			},
            "password": {
				required: true,
                minlength: 10,
                maxlength: 20
			},
			"re_password": {
				equalTo: "#password",
				minlength: 10,
                maxlength: 20
			}
		},
        messages: {
			"fullname": {
				required: "{{trans('message.err_fullname')}}"
			},
			"gender": {
				required: "{{trans('message.err_gender')}}"
			},
            "birthday": {
				required: "{{trans('message.err_birthday')}}"
			},
            "phone": {
				required: "{{trans('message.err_phone1')}}",
                phone: "{{trans('message.err_phone2')}}"
			},
            "email": {
				required: "{{trans('message.err_email1')}}",
                email: "{{trans('message.err_email2')}}"
			},
            "address": {
				required: "{{trans('message.err_address')}}",
			},
            "username": {
				required: "{{trans('message.err_username1')}}",
                minlength: "{{trans('message.err_username2')}}",
                maxlength: "{{trans('message.err_username3')}}"
			},
            "password": {
				required: "{{trans('message.err_password1')}}",
                minlength: "{{trans('message.err_password2')}}",
                maxlength: "{{trans('message.err_password3')}}"
			},
			"re_password": {
				equalTo: "{{trans('message.err_re_password1')}}"
			}
		}
    });
});

$.validator.addMethod("phone", function (value, element) {
    return this.optional(element) || /^(84|0[3|5|7|8|9])+([0-9]{8})\b/i.test(value);
}, "{{trans('message.err_phone2')}}");
/* End: Check validate form */
</script>
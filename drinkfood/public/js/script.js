$('document').ready(function(){

    /* Hàm hiển thị mật khẩu trong input */
    $('#btn_show_pass').click(function(event){

        var input_password = $("input[name=\'password\']");
        if($(input_password).attr('type') == "password")
        {
            document.getElementById('password').type = 'text';
            document.getElementById('icon_show').className = "fas fa-eye-slash";
        }else{
            document.getElementById('password').type = 'password';
            document.getElementById('icon_show').className = "fas fa-eye";
        }
    });
});
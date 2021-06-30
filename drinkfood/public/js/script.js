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

    /* Function change category when click choose type*/
    $('#select_type').on('change', function() {
        var type = this.value;

        $.ajax({
            url: "/Php_nam_P1/drinkfood/public/admin/product/change_cat/"+type,
            cache: false
        })
        .done(function( data ) {
            var optionCategory = "";
            var i;
            for(i = 0; i < data.length; i++)
            {
                optionCategory += "<option value='" + data[i]['id'] + "'>" + data[i]['name'] + "</option>";
            }
            $("#category").html(optionCategory);
        });
    });
});
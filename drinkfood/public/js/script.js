$('document').ready(function(){
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
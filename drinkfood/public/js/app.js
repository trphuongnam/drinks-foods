$(document).ready(function(){
    /* Call pjax to all page of website */
    $(document).pjax('[data-pjax] a, a[data-pjax]', '#templatemo_content');
    $.pjax.defaults.timeout = 3000;

    /* Function change quatity and update amount of product seleted */
    $(".quantity").change(function(){
        /* Get id current element */
        quantityId = $(this).attr('id');

        /* Get quantity of product and update data-input element*/
        quantity = $("#"+quantityId).val();
        quantityData = $("#"+quantityId).attr("data-input", quantity);

        /* Get uid product from id of current element */
        arrQuantity = quantityId.split('_');
        uidProduct = arrQuantity[1];

        /* Get price of product selected */
        priceProduct = $("#price_"+uidProduct).attr("data-input");
        
        /* Calc amount and display in screen*/
        calcAmount = (priceProduct*quantity);
        amount = calcAmount.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        $("#amount_"+uidProduct).html( amount);
        $("#amount_"+uidProduct).attr("data-input", calcAmount);

        /* Call the element class 'product_amount' and the return value of that element */
        var totalOrder = 0
        $('.product_amount').each(function (index, value) {
            totalOrder += parseInt($(this).attr('data-input'));
            $(".total_price").html( totalOrder.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
            $(".total_price").attr('data', totalOrder);
        });

        /* Call ajax to function create session when add quantity of product in cart page */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var idOrder = $("#del_product_"+uidProduct).attr('order');
        var idProduct = $("#del_product_"+uidProduct).attr('product');
        $.ajax({
            method: "POST",
            url: "/Php_nam_P1/drinkfood/public/cart/order/set_session",
            dataType:"text",
            data: { 
                uidProduct: uidProduct, 
                idProduct: idProduct,
                idOrder: idOrder,
                quantity: quantity,
                amountProduct: calcAmount
            }
          })
    });
    /* End:  Function change quatity and update amount of product seleted */
    
    /* Begin: Funtion rating product */
    $("#btn_ratings").click(function(){
        $("#star_rating").css("display", "inline-block");
    });

    $("#rating_1").click(function(){
        rating_1();
    });

    $("#rating_2").click(function(){
        rating_2();
    });

    $("#rating_3").click(function(){
        rating_3();
    });

    $("#rating_4").click(function(){
        rating_4();
    });

    $("#rating_5").click(function(){
        rating_5();
    });
    /* End: Funtion rating product */
});

/* Begin: Function show menu */
function show_menu()
{
    if($("#menu_dropdown").css("display") == "none")
    {
        $("#menu_dropdown").css("display", "block");
    }else{
        $("#menu_dropdown").css("display", "none");
    }
}
/* End: Function show menu */

/* Begin: Function show language */
function show_language()
{
    if($("#lang_dropdown").css("display") == "none")
    {
        $("#lang_dropdown").css("display", "block");
    }else{
        $("#lang_dropdown").css("display", "none");
    }
}
/* End: Function show language */

function rating_1()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "white");
    $("#rating_3").css("color", "white");
    $("#rating_4").css("color", "white");
    $("#rating_5").css("color", "white");   

    requestAjaxRating(1);
}

function rating_2()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "white");
    $("#rating_4").css("color", "white");
    $("#rating_5").css("color", "white");

    requestAjaxRating(2);
}

function rating_3()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "yellow");
    $("#rating_4").css("color", "white");
    $("#rating_5").css("color", "white");

    requestAjaxRating(3);
}

function rating_4()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "yellow");
    $("#rating_4").css("color", "yellow");
    $("#rating_5").css("color", "white");

    requestAjaxRating(4);
}

function rating_5()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "yellow");
    $("#rating_4").css("color", "yellow");
    $("#rating_5").css("color", "yellow");

    requestAjaxRating(5);
}
/* End: function rating(star) */

function requestAjaxRating(stars)
{
    var id_product = $("#id_product").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "POST",
        url: "/Php_nam_P1/drinkfood/public/ratings",
        dataType:"text",
        data: { 
            star: stars, 
            id_product: id_product,
            status: 1,
        }
      }).done(function( data ) {
            obj = JSON.parse(data)

            /* show quality rating of current user */
            var starElement = "";
            for(i = 1; i <= obj.star; i++)
            {
                starElement += "<i class='fas fa-star rating'></i>";
            }
            $("#stars_user_rating").html(starElement);
            
            /* display message and hiddent star rating bar */
            alert(obj.msg);
            $("#star_rating").css("display","none");
        });
}

/* Begin: Function ajax handling add product to cart */
function addCart(uidProduct)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "POST",
        url: "/Php_nam_P1/drinkfood/public/cart",
        dataType:"text",
        data: {
            'uidProduct':uidProduct
        }
    }).done(function( msg ) {
        var objMessage = JSON.parse(msg);

        /* Create div display message from server return */
        messageElement = "<div class='message_alert warning'><i class='far fa-times-circle'>&nbsp;&nbsp;</i>"+objMessage.message+"</div>";
        if(objMessage.status == 1) messageElement = "<div class='message_alert success'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+objMessage.message+"</div>";
        
        /* Set time after 3s remove div message */
        $('body').append(messageElement);
        setTimeout(function(){ 
            $(".message_alert").remove();
        }, 3000);
    });
}
/* Begin: Function ajax handling add product to cart */

/* Function delete product in the carts */
function delProduct(uidProduct)
{
    var idOrder = $("#del_product_"+uidProduct).attr("order");
    var idProduct = $("#del_product_"+uidProduct).attr("product");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/Php_nam_P1/drinkfood/public/cart/"+uidProduct,
        method: 'POST',
        type: 'text',
        data: {
            "idOrder": idOrder,
            "idProduct": idProduct,
            "uidProduct": uidProduct
        }
    }).done(function( msg ){
        /* Create div display message from server return */
        messageElement = "<div class='message_alert warning'><i class='far fa-times-circle'>&nbsp;&nbsp;</i>"+msg.message+"</div>";
        if(msg.status == true) 
        {
            /* Get amount of product seleted */
            amountProductDelete = $("#amount_"+uidProduct).attr("data-input");

            /* Remove element of product deleted */
            $("#"+uidProduct).remove();

            /* Calc total amount of orders after deleted product */
            reTotalAmount = (parseInt($(".total_price").attr('data'))-parseInt(amountProductDelete));
            
            /* Update total amount in to attribute 'data' and box amount order*/
            $(".total_price").attr("data", reTotalAmount);
            $(".total_price").html(reTotalAmount.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
            
            /* Create div display message from server return */
            messageElement = "<div class='message_alert success'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+msg.message+"</div>";
        }
        /* Set time after 3s remove div message */
        $('body').append(messageElement);
        setTimeout(function(){ 
            $(".message_alert").remove();
        }, 3000);

    });
}

/* Function order product */
function accept_order(idOrder)
{
    if($("#address").val() == "" || $("#phone").val() == "" )
    {
        elementMessage = "<div class='message_alert warning'><i class='far fa-check-circle'>&nbsp;&nbsp;</i> Vui lòng cập nhật số điện thoại và địa chỉ của bạn</div>";
        /* Set time after 3s remove div message */
        $('body').append(elementMessage);
        setTimeout(function(){ 
            $(".message_alert").remove();
        }, 3000);
    }else{
        /* hidden button delete product */
        $('.btn_del_product').css('display', 'none');
        $('.quantity').prop("readonly", true);
        $('#btn_accept_order').css('display', 'none');
        $('#btn_cancel_order').css('display', 'none');

        /* Change button order to loading bar */
        $(".order_bar_right").append("<div class='lds-dual-ring loadingio-spinner-dual-ring-w43m9acj56m'><div class='ldio-kuo96gb6c4'><div></div><div><div></div></div>");

        /* Get all uidProduct move in to array */
        var arrayUidProduct = [];
        $(".product_cart").each(function (index, value) {
            arrayUidProduct.push($(this).attr('id'));
        });

        /* Get total amount of current cart */
        var totalAmount = $(".total_price").attr('data');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/Php_nam_P1/drinkfood/public/order",
            method: 'POST',
            type: 'text',
            data: {
                "arrayUidProduct": arrayUidProduct,
                "totalAmount": totalAmount,
                "idOrder": idOrder
            }
        }).done(function(msg){
            if(msg['status'] == true)
            {
                // 1 Remove all current products
                $(".product_cart").remove();
                // 2 Update num product in title bar
                $(".total_product").html('(0 Sản phẩm)');

                elementMessage = "<div class='message_alert success'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+msg.message+"</div>";
                $(".order_bar_right").html("<img src='https://img.icons8.com/emoji/100/000000/check-box-with-check-emoji.png'/>");
            }else{
                elementMessage = "<div class='message_alert warning'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+msg.message+"</div>";
                $(".lds-dual-ring").remove();
                $('#btn_accept_order').css('display', 'block');
                $('#btn_cancel_order').css('display', 'block');
                $('.btn_del_product').css('display', 'block');
                $('.quantity').prop("readonly", false);
            }

            /* Set time after 3s remove div message */
            $('body').append(elementMessage);
            setTimeout(function(){ 
                $(".message_alert").remove();
            }, 3000);
        });
    }
}

function destroy_order(idOrder)
{
    if(!confirm("Do you really want to do this?")) {
        return false;
    }else{
        /* hidden button delete product */
        $('.btn_del_product').css('display', 'none');
        $('.quantity').prop("readonly", true);
        $('#btn_accept_order').css('display', 'none');
        $('#btn_cancel_order').css('display', 'none');

        /* Change button order to loading bar */
        $(".order_bar_right").append("<div class='lds-dual-ring loadingio-spinner-dual-ring-w43m9acj56m'><div class='ldio-kuo96gb6c4'><div></div><div><div></div></div>");

        /* Get all uidProduct move in to array */
        var arrayUidProduct = [];
        $(".product_cart").each(function (index, value) {
            arrayUidProduct.push($(this).attr('id'));
        });

        /* Call ajax function to destroy function in server */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/Php_nam_P1/drinkfood/public/cart/"+idOrder,
            type: 'delete',
            dataType: 'text',
            data: {
                "arrayUidProduct": arrayUidProduct,
            }
        }).done(function(msg){
            objMsg = JSON.parse(msg)
            if(objMsg.status == true)
            {
                // 1 Remove all current products
                $(".product_cart").remove();
                // 2 Update num product in title bar
                $(".total_product").html('(0 Sản phẩm)');
                $(".total_price").html('0 VND');
                $(".total_price").attr('data', 0);

                elementMessage = "<div class='message_alert success'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+objMsg.message+"</div>";
                $(".order_bar_right").html("<img src='https://img.icons8.com/emoji/100/000000/check-box-with-check-emoji.png'/>");
            }else{
                elementMessage = "<div class='message_alert warning'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+objMsg.message+"</div>";
                $(".lds-dual-ring").remove();
                $('#btn_accept_order').css('display', 'block');
                $('#btn_cancel_order').css('display', 'block');
                $('.btn_del_product').css('display', 'block');
                $('.quantity').prop("readonly", false);
            }

            /* Set time after 3s remove div message */
            $('body').append(elementMessage);
            setTimeout(function(){ 
                $(".message_alert").remove();
            }, 3000);
        });
    }
}

function destroy_cart(idOrder)
{
    if(!confirm("Do you really want to do this?")) {
        return false;
    }else{
        /* hidden button delete product */
        $('.btn_del_product').css('display', 'none');
        $('.quantity').prop("readonly", true);
        $('#btn_accept_order').css('display', 'none');
        $('#btn_cancel_order').css('display', 'none');

        /* Change button order to loading bar */
        $(".order_bar_right").append("<div class='loading_spin loadingio-spinner-dual-ring-w43m9acj56m'><div class='ldio-kuo96gb6c4'><div></div><div><div></div></div>");

        /* Get all uidProduct move in to array */
        var arrayUidProduct = [];
        $(".product_cart").each(function (index, value) {
            if (typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false) {
                arrayUidProduct.push($(this).attr('id'));
            }
        });

        /* Call ajax function to destroy function in server */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/Php_nam_P1/drinkfood/public/cart/"+idOrder,
            type: 'delete',
            dataType: 'text',
            data: {
                "arrayUidProduct": arrayUidProduct,
            }
        }).done(function(msg){
            console.log(msg);
            objMsg = JSON.parse(msg)
            if(objMsg.status == true)
            {
                // 1 Remove all current products
                $(".product_cart").remove();
                // 2 Update num product in title bar
                $(".total_product").html('(0 Sản phẩm)');
                $(".total_price").html('0 VND');
                $(".total_price").attr('data', 0);

                elementMessage = "<div class='message_alert success'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+objMsg.message+"</div>";
                $(".order_bar_right").html("<img src='https://img.icons8.com/emoji/100/000000/check-box-with-check-emoji.png'/>");
            }else{
                console.log(objMsg.exception)
                elementMessage = "<div class='message_alert warning'><i class='far fa-check-circle'>&nbsp;&nbsp;</i>"+objMsg.message+"</div>";
                $(".loading_spin").remove();
                $('#btn_accept_order').css('display', 'block');
                $('#btn_cancel_order').css('display', 'block');
                $('.btn_del_product').css('display', 'block');
                $('.quantity').prop("readonly", false);
            }

            /* Set time after 3s remove div message */
            $('body').append(elementMessage);
            setTimeout(function(){ 
                $(".message_alert").remove();
            }, 3000);
        });
    }
}
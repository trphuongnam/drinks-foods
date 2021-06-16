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

$(document).ready(function(){

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
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
}

function rating_2()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "white");
    $("#rating_4").css("color", "white");
    $("#rating_5").css("color", "white");
}

function rating_3()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "yellow");
    $("#rating_4").css("color", "white");
    $("#rating_5").css("color", "white");
}

function rating_4()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "yellow");
    $("#rating_4").css("color", "yellow");
    $("#rating_5").css("color", "white");
}

function rating_5()
{
    $("#rating_1").css("color", "yellow");
    $("#rating_2").css("color", "yellow");
    $("#rating_3").css("color", "yellow");
    $("#rating_4").css("color", "yellow");
    $("#rating_5").css("color", "yellow");
}
/* End: function rating(star) */
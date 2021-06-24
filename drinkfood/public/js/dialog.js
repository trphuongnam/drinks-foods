$(document).ready(function(){
    $("#btn_show_new_password").click(function(event){
        event.preventDefault();
        $("#btn_update_info").css('display', 'none');
        $( "#dialog" ).css('display', 'block');
    });

    $(".cancel_dialog").click(function(){
        $( "#dialog" ).css('display', 'none');
        $("#btn_update_info").css('display', 'block');
    });
});
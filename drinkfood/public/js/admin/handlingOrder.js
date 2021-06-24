/* Function accept order */
function accept_order(uidOrder)
{
    var status = $("#order_"+uidOrder).attr('status');

    /* Call ajax function update status of order*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "PUT",
        url: "/Php_nam_P1/drinkfood/public/admin/order/"+uidOrder,
        data: { status: status, uidOrder: uidOrder }
      }).done(function( result ) {
          if(result['status'] != false)
          {
            /* Change value of element status */
            $("#order_"+uidOrder).attr('status', result['status']);

            /* Change name status in span tag */
            $("#order_"+uidOrder).html(result['text_status']);

            /* Change event onclick and name button */
            $("#"+uidOrder).attr("onclick","delivery('"+uidOrder+"')");
            $("#"+uidOrder).html(result['button']);
          }else{
              alert(result['message']);
          }
        });
}

/* Function handling delivery order */
function delivery(uidOrder)
{
    var status = $("#order_"+uidOrder).attr('status');

    /* Call ajax function update status of order*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "PUT",
        url: "/Php_nam_P1/drinkfood/public/admin/order/"+uidOrder,
        data: { status: status, uidOrder: uidOrder }
      }).done(function( result ) {
          if(result['status'] != false)
          {
            /* Change value of element status */
            $("#order_"+uidOrder).attr('status', result['status']);

            /* Change name status in span tag */
            $("#order_"+uidOrder).html(result['text_status']);

            /* Change event onclick and name button */
            $("#"+uidOrder).attr("onclick","finish_order('"+uidOrder+"')");
            $("#"+uidOrder).html(result['button']);
          }else{
              alert(result['message']);
          }
        });
}

/* Function handling delivery order */
function finish_order(uidOrder)
{
    var status = $("#order_"+uidOrder).attr('status');

    /* Call ajax function update status of order*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "PUT",
        url: "/Php_nam_P1/drinkfood/public/admin/order/"+uidOrder,
        data: { status: status, uidOrder: uidOrder }
      }).done(function( result ) {
          if(result['status'] != false)
          {
            /* Change value of element status */
            $("#order_"+uidOrder).attr('status', result['status']);

            /* Change name status in span tag */
            $("#order_"+uidOrder).html(result['text_status']);

            /* Remove current button */
            $( "#"+uidOrder ).remove();
          }else{
              alert(result['message']);
          }
        });
}
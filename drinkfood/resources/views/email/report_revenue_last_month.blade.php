<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans_choice('message.email_title', 1) }}</title>

    <style>
        *{
            text-align: center;
        }
        #wrapper{
            width: 1000px;
            height: 100%;
            background-color: darkturquoise;
            margin: 0 auto;
        }

        .content_mail{
            text-align: left;
            margin: 0px 30px
        }

        .attention{
            color: #ec0d0d;
            font-style: bold;
            font-size: 20px;
        }
        .text_info{
            font-style: italic;
        }

        .table_wrapper{
            width: 80%;
            margin: 10px auto;
            border: 1px solid;
            background: #fff;
        }
        .table_header{
            background: darkorange;
            font-family: arial;
            color: #fff;
        }
        .row_header{
            height: 30px;
        }
        .table_body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .row_content{
            height: 30px;
        }
        .row_content:nth-child(2n+2){
            background: beige;
        }
        .total_amount{
            font-weight: bold;
        }
        tfoot{
            background: #ec0d0d;
            color: #fff;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <h1>Drinks & Foods</h1>
        <h3>{!! trans_choice('message.email_title', 4).'&nbsp;'.date('m/Y')!!}</h3>
        <table class="table_wrapper">
            <thead class="table_header">
                <tr class="row_header">
                    <th>{{ trans('message.num_order') }}</th>
                    <th>{{ trans('message.status') }}</th>
                    <th>{{ trans('message.quantity') }}</th>
                    <th>{{ trans('message.total') }}</th>
                </tr>
            </thead>

            <tbody class="table_body">
                <th>1</th>
                <th>{{ trans('order_lang.orders_sold') }}</th>
                <th>{{$contentEmail['totalOrderFinished'].' '.trans('order_lang.orders')}}</th>
                <th>{{number_format($contentEmail['totalAmountMonth'], 0, ',', '.')." VND"}}</th>
            </tbody>
        </table>
    </div>
</body>
</html>
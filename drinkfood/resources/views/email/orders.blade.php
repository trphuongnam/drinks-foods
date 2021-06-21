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
        <h3>{{ trans_choice('message.email_title', 1) }}</h3>
        <p class="content_mail">
            {{ trans('message.fullname') }}: <span class="text_info">{{$contentEmail['infoUser']['fullname']}}</span> <br>
            {{ trans('message.email') }}: <span class="text_info">{{$contentEmail['infoUser']['email']}}</span> <br>
            {{ trans('message.order_name') }}: <span class="text_info">{{$contentEmail['infoOrder'][0]['name']}}</span> <br>
            {{ trans('message.time_order') }}: <span class="text_info">{{date('d-m-Y h:s', strtotime($contentEmail['infoOrder'][0]['updated_at']))}}</span> <br>
            {{ trans('message.status') }}: <span class="text_info">{{trans_choice('message.status_order',$contentEmail['infoOrder'][0]['status'])}}</span> <br>
        </p>
        <table class="table_wrapper">
            <thead class="table_header">
                <tr class="row_header">
                    <th>{{ trans('message.num_order') }}</th>
                    <th>{{ trans('message.product_name') }}</th>
                    <th>{{ trans('message.quantity') }}</th>
                    <th>{{ trans('message.price') }}</th>
                    <th>{{ trans('message.amount') }}</th>
                </tr>
            </thead>

            <tbody class="table_body">
                {!!showContentEmail($contentEmail['detailOrder'])!!}
            </tbody>
            <tfoot>
                <tr class="row_header">
                    <th colspan=4>{{ trans('message.total') }}</th>
                    <th class="total_amount">{{number_format($contentEmail['infoOrder'][0]['total_amount'], 0, ',', '.')." VND"}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
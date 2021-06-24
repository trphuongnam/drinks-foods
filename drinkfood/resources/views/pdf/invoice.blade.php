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
            font-family: DejaVu Sans, sans-serif !important;
        }
        #wrapper{
            width: 100%;
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
            width: 100%;
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
        <div class="content_mail">
            <h1>Drinks & Foods</h1>
            <h3>{{ trans_choice('message.email_title', 1) }}</h3>
            {{ trans('message.fullname') }}: <span class="text_info">{{Auth::user()->fullname}}</span> <br>
            {{ trans('message.email') }}: <span class="text_info">{{Auth::user()->email}}</span> <br>
            {{ trans('message.order_name') }}: <span class="text_info">{{$data['orderInfo'][0]->name}}</span> <br>
            {{ trans('message.time_order') }}: <span class="text_info">{{date('d-m-Y h:i:s', strtotime($data['orderInfo'][0]->date_order))}}</span> <br>
            {{ trans('message.status') }}: <span class="text_info">{{trans_choice('message.status_order',$data['orderInfo'][0]->status)}}</span> <br>
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
                    @php
                        $numOrder = 0;
                        $rowTable = "";
                        for ($i = 0; $i < count($data['detailOrder']); $i++) { 
                            $numOrder++;
                            $idProduct = $data['detailOrder'][$i]->id_product;
                            $quantity = $data['detailOrder'][$i]->quantity;
                            $unitPrice = number_format($data['detailOrder'][$i]->unit_price, 0, ',', '.')." VND";
                            $amountProduct = number_format($data['detailOrder'][$i]->unit_price * $data['detailOrder'][$i]->quantity, 0, ',', '.')." VND";
    
                            $rowTable .= "<tr class='row_content'><td>".$numOrder."</td><td>".getNameProduct($idProduct)."</td>
                                <td>".$quantity."</td><td>".$unitPrice."</td>
                                <td>".$amountProduct."</td></tr>";
                        }
                        echo $rowTable;
                    @endphp
                </tbody>
                <tfoot>
                    <tr class="row_header">
                        <th colspan=4>{{ trans('message.total') }}</th>
                        <th class="total_amount">{{number_format($data['orderInfo'][0]->total_amount, 0, ',', '.')." VND"}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>  
    </div>
</body>
</html>
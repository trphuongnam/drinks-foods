@extends('public/layouts/master_layout')
@section('title', trans('message.profile'))

@section('content')
<div class="box_content">

    {{-- Begin: Order detail--}}
    <div class="product_box">    
        <h1>{{ trans('message.order_detail') }}</span></h1>
        <a href="{{url('/export/invoice').'/'.$orderInfo[0]->uid}}" class="btn btn_green"><i class="fas fa-download">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_export') }}</a>
        
        @if ($orderInfo[0]->status == 1)
        <form action="{{ url('/order').'/'.$orderInfo[0]->uid }}" method="post">
            <input id="btn_cancel_order" class="btn btn_red" type="submit" value="{{ trans('message.cancel') }}" />
            <input type="hidden" name="_method" value="delete" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        @endif
        
        <table class="table_data">
            <tr class="table_title">
                <th colspan=5>
                    {{ trans('message.fullname') }}: <span class="text_info">{{Auth::user()->fullname}}</span> <br>
                    {{ trans('message.email') }}: <span class="text_info">{{Auth::user()->email}}</span> <br>
                    {{ trans('message.order_name') }}: <span class="text_info">{{$orderInfo[0]->name}}</span> <br>
                    {{ trans('message.time_order') }}: <span class="text_info">{{date('d-m-Y h:i:s', strtotime($orderInfo[0]->updated_at))}}</span> <br>
                    {{ trans('message.status') }}: <span class="text_info">{{trans_choice('message.status_order', $orderInfo[0]->status)}}</span> <br>
                </th>
            </tr>
            <tr class="table_header">
                <th>{{ trans('message.num_order') }}</th>
                <th>{{ trans('message.product_name') }}</th>
                <th>{{ trans('message.quantity') }}</th>
                <th>{{ trans('message.price') }}</th>
                <th>{{ trans('message.amount') }}</th>
            </tr>
    
            @if (count($detailOrder) > 0)
                @foreach ($detailOrder as $product)
                <tr class="table_content product_cart">
                    <td>{{$loop->iteration}}</td>
                    <td>{{getNameProduct($product->id_product)}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{formatCurrency($product->unit_price)}}</td>
                    <td>
                        {{formatCurrency($product->unit_price*$product->quantity)}}
                    </td>
                </tr>
                @endforeach
            @endif 
            <tr class="table_footer">
                <td colspan="4">{{ trans('message.total') }}</td>
                <td>{{formatCurrency($orderInfo[0]->total_amount)}}</td>
            </tr>
        </table>
    </div>
    {{-- End: Order detail--}}
</div>
@endsection
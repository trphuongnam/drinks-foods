@php
    $listOrder = getHistoryOrder(Auth::user()->id);
    if(Session::has('msg_delete_order')) echo "<div class='message_alert success'>".Session::get('msg_delete_order')."</div>";
@endphp
<div class="product_box">    
    <h1>{{ trans('message.history_order') }}</span></h1>
    <table class="table_data">
        <tr class="table_header">
            <th>{{ trans('message.num_order') }}</th>
            <th>{{ trans('message.order_name') }}</th>
            <th>{{ trans('message.time_order') }}</th>
            <th>{{ trans('message.total') }}</th>
            <th>{{ trans('message.status') }}</th>
            <th>{{ trans('message.option') }}</th>
        </tr>

        @if (count($listOrder) > 0)
            @foreach ($listOrder as $order)
            <tr class="table_content" style="color:{{changeColorStatus($order->status)}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$order->name}}</td>
                <td>{{($order->date_order != null) ? date('d-m-Y h:i', strtotime($order->date_order)) : ""}}</td>
                <td>{{($order->total_amount != null) ? formatCurrency($order->total_amount)  : ""}}</td>
                <td>{{ trans_choice('message.status_order', $order->status)}}</td>
                <td>
                    <a href="{{url('/order').'/'.$order->url_key.'-'.$order->uid}}" class="btn btn_green"><i class="fas fa-info-circle">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.detail') }}</a>
                </td>
            </tr>
            @endforeach
        @else
            <span class="error">{{ trans('message.not_found') }}</span>
        @endif 
    </table>
    {{ $listOrder->links("public.layouts.elements.paginate_bar") }}
</div>

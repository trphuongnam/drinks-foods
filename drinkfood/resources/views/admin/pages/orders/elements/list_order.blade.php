@if (count($orders) > 0)
    @foreach ($orders as $order)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>
            {!!$order->name."<br><span class='price'>".number_format($order->total_amount, 0, ',', '.').' VND</span>'!!}
        </td>
        <td>
            {!!$order->user_fullname.' - '.$order->user_email.'<br>'.$order->user_phone.'<br>'.$order->address.date('d-m-Y h:i', strtotime($order->date_order))!!}
        </td>
        <td>
            {!!displayStatusOrder($order->status, $order->uid)!!}
            {!!showButtonHandling($order->status, $order->uid)!!}
        </td>
        <td>
            <a href="{{url('/admin/order'.'/'.$order->uid)}}" class="btn btn-app" title="{{ trans('message.detail') }}" id="btn_detail_{{$order->uid}}" onclick="show_detail('{{$order->uid}}')"><i class="fas fa-eye"></i>{{ trans('message.detail') }}</a>           
            <a class='btn btn-block btn-success' href="{{url('/export/invoice'.'/'.$order->uid)}}"><i class="fas fa-download">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_export') }}</a>
        </td>
    </tr>
    @endforeach
@else
    <tr><td colspan=5 class="text-center">{{ trans('message.no_categories_yet') }}</td></tr>
@endif 
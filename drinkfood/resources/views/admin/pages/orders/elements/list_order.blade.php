@if (count($orders) > 0)
    @foreach ($orders as $order)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->user_fullname.' - '.date('d-m-Y h:i', strtotime($order->date_order))}}</td>
        <td>{!!displayStatusOrder($order->status)!!}</td>
        <td>
            <a href="{{url('/admin/order'.'/'.$order->uid)}}" class="btn btn-app" title="{{ trans('message.detail') }}" id="btn_detail_{{$order->uid}}" onclick="show_detail('{{$order->uid}}')"><i class="fas fa-eye"></i>{{ trans('message.detail') }}</a>           
        </td>
    </tr>
    @endforeach
@else
    <tr><td colspan=5 class="text-center">{{ trans('message.no_categories_yet') }}</td></tr>
@endif 
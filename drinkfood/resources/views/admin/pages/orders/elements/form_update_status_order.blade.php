<form action="{{url('admin/order/'.$detailOrder[0]->id_order)}}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="status" value="{{$detailOrder[0]->order_status}}">
    {!!showButtonHandling($detailOrder[0]->order_status)!!}
    <a class='btn btn-block btn-success col-3' href="{{url('/export/invoice'.'/'.$uidOrder)}}"><i class="fas fa-download">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_export') }}</a>
</form>
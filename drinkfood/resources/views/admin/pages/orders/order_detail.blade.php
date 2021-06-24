@extends('admin.layouts.master_layout')

@section('title', trans('order_lang.manage_order'))

@section('content_title',trans('order_lang.detail_order'))
    
@section('content')
<div class="row">
    <div class="col-12">
        @if (count($detailOrder) > 0)
        <div class="card">
            <div class="card-header">
                @if (Session::has('update_status_order_success'))
                <div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{Session::get('update_status_order_success')}}</div>
                @endif
                @if (Session::has('update_status_order_error'))
                <div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{Session::get('update_status_order_error')}}</div>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$detailOrder[0]->name}}</h5>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="5">
                                <ul>
                                    <li>{{ trans('message.fullname').": ".getInfoUserOrder($detailOrder[0]->id_user_created)[0]->fullname }}</li>
                                    <li>{{ trans('message.phone').": ".getInfoUserOrder($detailOrder[0]->id_user_created)[0]->phone }}</li>
                                    <li>{{ trans('message.email').": ".getInfoUserOrder($detailOrder[0]->id_user_created)[0]->email }}</li>
                                    <li>{{ trans('message.order_name').": ".$detailOrder[0]->order_name }}</li>
                                    <li>{{ trans('message.time_order').": ".date('d-m-Y h:i', strtotime($detailOrder[0]->date_order)) }}</li>
                                    <li>{!! trans('message.status').": ".displayStatusOrder($detailOrder[0]->order_status) !!}</li>
                                </ul>
                                @include('admin.pages.orders.elements.form_update_status_order')
                            </th>
                        </tr>
                        <tr>
                          <th>{{ trans('message.num_order') }}</th>
                          <th>{{ trans('message.product_name') }}</th>
                          <th>{{ trans('message.quantity')}}</th>
                          <th>{{ trans('message.price') }}</th>
                          <th>{{ trans('message.amount') }}</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            <tr>
                                <td colspan="4">{{ trans('message.total') }}</td>
                                <td>{{formatCurrency($detailOrder[0]->total_amount)}}</td>
                            </tr>
                        @endif 
                    </tbody>
                </table>
            </div>
        </div>
        @endif
  </div>
  <script>
    
  </script>
@endsection
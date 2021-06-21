@extends('public/layouts/master_layout')
@section('title', trans('message.cart'))

@section('content')

<div class="box_content">
    <h1>{{ trans('message.cart') }} <span class="total_product">({{count($arrayProduct).' '.trans('message.product') }})</span></h1>
    @if ($status == 1)
        @for ($i = 0; $i < count($arrayProduct); $i++ )
            @php
                $amountProduct = calcAmountProduct($arrayProduct[$i][0]['price'], $idOrder, $arrayProduct[$i][0]['id'], $arrayProduct[$i][0]['uid']);
            @endphp
            {{-- Begin: product item--}}
            <div class="product_box product_cart" id="{{$arrayProduct[$i][0]['uid']}}">    
                <div class="image_panel"><img src="{{productImage($arrayProduct[$i][0]['image'])}}" alt="CSS Template" width="100" height="150" /></div>
                <ul class="info_product">
                    <li><a href="{{url('/product').'/'.$arrayProduct[$i][0]['cat_url_key'].'-'.$arrayProduct[$i][0]['uid_cat'].'/'.$arrayProduct[$i][0]['url_key'].'-'.$arrayProduct[$i][0]['uid']}}">{{$arrayProduct[$i][0]['name']}}</a></li>
                    <li>{{ trans('message.store') }}: {{$arrayProduct[$i][0]['brand']}}</li>
                    <li>{{ trans('message.category') }}: {{$arrayProduct[$i][0]['cat_name']}}</li>
                    <li>{{ trans('message.price') }}: <span class="price" id="price_{{$arrayProduct[$i][0]['uid']}}" data-input="{{$arrayProduct[$i][0]['price']}}">{{number_format($arrayProduct[$i][0]['price'], 0, ',', '.')." VND"}}</span></li>
                    <li>{{ trans('message.amount') }} <span class="price product_amount" id="amount_{{$arrayProduct[$i][0]['uid']}}" data-input="{{$amountProduct}}">{{number_format($amountProduct, 0, ',', '.')." VND"}}</span></li>
                </ul>
                <div class="box_select_amount">
                    <label for="quantity">{{ trans('message.quantity') }}</label>
                    <input type="number" min="1" name="quantity" id="quantity_{{$arrayProduct[$i][0]['uid']}}" data-input="{{getQuantity($idOrder, $arrayProduct[$i][0]['id'], $arrayProduct[$i][0]['uid'])}}" value="{{getQuantity($idOrder, $arrayProduct[$i][0]['id'], $arrayProduct[$i][0]['uid'])}}" class="form_input quantity">
                </div>
                <a href="javascript:void(0)" id="del_product_{{$arrayProduct[$i][0]['uid']}}" onclick="delProduct('{{$arrayProduct[$i][0]['uid']}}')" class="btn btn_red btn_del_product" order="{{$idOrder}}" product="{{$arrayProduct[$i][0]['id']}}"><i class="fas fa-trash-alt">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.delete_product') }}</a>
                <div class="cleaner_with_height">&nbsp;</div>
            </div>
            {{-- End: product item--}}
        @endfor

        {{-- Begin: Total bar--}}
        <div class="order_bar">
            <ul class="order_bar_left">
                <li>{{ trans('message.total') }} <span class="total_price" data={{calcTotalOrder()}}>{{number_format(calcTotalOrder(), 0, ',', '.')." VND"}}</span></li>
                <hr>
                <li>{{ trans('message.fullname') }}: <b>{{Auth::user()->fullname}}</b></li>
                <li>{{ trans('message.email') }}: <b>{{Auth::user()->email}}</b></li>
                <li>{{ trans('message.phone') }}: <input type="text" min="1" name="phone" id="phone" class="form_input" value="{{Auth::user()->phone}}" readonly></li>
                <li>
                    <label>{{ trans('message.address') }}: </label>
                    <input type="text" min="1" name="address" id="address" class="form_input" value="{{Auth::user()->address}}" readonly>
                </li>
            </ul>
            <div class="order_bar_right">
                <a href="javascript:void(0)" id="btn_accept_order" class="btn btn_green" onclick="accept_order({{$idOrder}})"><i class="fas fa-shipping-fast">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.order') }}</a>
                <a href="javascript:void(0)" id="btn_cancel_order" class="btn btn_red"><i class="fas fa-window-close">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.cancel') }}</a>
            </div> 
        </div>
        {{-- End: Total bar --}}
    @else
        <div class="blank_page" style="background-image:url({{asset('images/icons/product_not_found.png')}})"></div>
    @endif
    
</div>
@endsection
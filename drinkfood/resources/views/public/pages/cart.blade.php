@extends('public/layouts/master_layout')
@section('title', trans('message.cart'))

@section('content')
<div class="box_content">
    <h1>{{ trans('message.cart') }} <span>(1 {{ trans('message.product') }})</span></h1>

    {{-- Begin: product 1--}}
    <div class="product_box product_cart">    
        <div class="image_panel"><img src="{{asset('images/sp4.jpg')}}" alt="CSS Template" width="100" height="150" /></div>
        <ul class="info_product">
            <li>{{ trans('message.store') }}: <a href="#">Cơm 165</a></li>
            <li>{{ trans('message.address') }}: 165 Ngô Văn Sở, Liên Chiểu, Đà Nẵng</li>
            <li>{{ trans('message.category') }}: Cơm</li>
            <li>{{ trans('message.user_post') }}: Trần Phương Nam</li>
            <li>{{ trans('message.price') }}: <span class="price">25.000 VNĐ</span></li>
        </ul>
        <div class="box_select_amount">
            <label for="amount">{{ trans('message.amount') }}</label>
            <input type="number" min="1" name="amount" id="amount_1" value=1 class="form_input input_amount">
        </div>
        <a href="javascript:void(0)" class="btn btn_red"><i class="fas fa-trash-alt">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.delete_product') }}</a>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: product 1--}}

    {{-- Begin: product 1--}}
    <div class="product_box product_cart">    
        <div class="image_panel"><img src="{{asset('images/sp4.jpg')}}" alt="CSS Template" width="100" height="150" /></div>
        <ul class="info_product">
            <li>{{ trans('message.store') }}: <a href="#">Cơm 165</a></li>
            <li>{{ trans('message.address') }}: 165 Ngô Văn Sở, Liên Chiểu, Đà Nẵng</li>
            <li>{{ trans('message.category') }}: Cơm</li>
            <li>{{ trans('message.user_post') }}: Trần Phương Nam</li>
            <li>{{ trans('message.price') }}: <span class="price">25.000 VNĐ</span></li>
        </ul>
        <div class="box_select_amount">
            <label for="amount">{{ trans('message.amount') }}</label>
            <input type="number" min="1" name="amount" id="amount_1" value=1 class="form_input input_amount">
        </div>
        <a href="javascript:void(0)" class="btn btn_red"><i class="fas fa-trash-alt">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.delete_product') }}</a>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: product 1--}}

    {{-- Begin: product 1--}}
    <div class="product_box product_cart">    
        <div class="image_panel"><img src="{{asset('images/sp4.jpg')}}" alt="CSS Template" width="100" height="150" /></div>
        <ul class="info_product">
            <li>{{ trans('message.store') }}: <a href="#">Cơm 165</a></li>
            <li>{{ trans('message.address') }}: 165 Ngô Văn Sở, Liên Chiểu, Đà Nẵng</li>
            <li>{{ trans('message.category') }}: Cơm</li>
            <li>{{ trans('message.user_post') }}: Trần Phương Nam</li>
            <li>{{ trans('message.price') }}: <span class="price">25.000 VNĐ</span></li>
        </ul>
        <div class="box_select_amount">
            <label for="amount">{{ trans('message.amount') }}</label>
            <input type="number" min="1" name="amount" id="amount_1" value=1 class="form_input input_amount">
        </div>
        <a href="javascript:void(0)" class="btn btn_red"><i class="fas fa-trash-alt">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.delete_product') }}</a>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: product 1--}}

    {{-- Begin: Total bar--}}
    <div class="order_bar">
        <ul class="order_bar_left">
            <li>{{ trans('message.fullname') }}: <b>Trần Phương Nam</b></li>
            <li>{{ trans('message.address') }}: <b>165 Ngô Văn Sở, Liên Chiểu, Đà Nẵng</b></li>
            <hr>
            <li>{{ trans('message.total') }} <span class="total_price">25.000 VNĐ</span></li>
        </ul>
        <div class="order_bar_right">
            <a href="javascript:void(0)" class="btn btn_green"><i class="fas fa-shipping-fast">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.order') }}</a>
        </div> 
    </div>
    {{-- End: Total bar --}}
    
</div>
@endsection
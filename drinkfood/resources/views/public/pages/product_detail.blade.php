@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')
<div class="box_content">

    {{-- Begin: Content product--}}
    <div class="product_box">    
        <h1>Cơm Gà Chiên <span>(Cơm 165)</span></h1>
        <div class="image_panel"><img src="{{asset('images/sp4.jpg')}}" alt="CSS Template" width="100" height="150" /></div>
        <ul class="info_product">
            <li>{{ trans('message.store') }}: <a href="#">Cơm 165</a></li>
            <li>{{ trans('message.address') }}: 165 Ngô Văn Sở, Liên Chiểu, Đà Nẵng</li>
            <li>{{ trans('message.category') }}: Cơm</li>
            <li>{{ trans('message.user_post') }}: Trần Phương Nam</li>
            <li>{{ trans('message.price') }}: <span class="price">25.000 VNĐ</span></li>
            <li>{{ trans_choice('message.user_rating', 1) }}: 
                <i class="fas fa-star rating"></i>
                <i class="fas fa-star rating"></i>
                <i class="fas fa-star rating"></i>
                <i class="fas fa-star rating"></i>
                <i class="fas fa-star rating"></i>
            </li>
            <li>
                {{ trans_choice('message.user_rating', 2) }}: <br>
                <a href="javascript:void(0)" id="rating_1" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                <a href="javascript:void(0)" id="rating_2" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                <a href="javascript:void(0)" id="rating_3" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                <a href="javascript:void(0)" id="rating_4" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                <a href="javascript:void(0)" id="rating_5" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
            </li>
        </ul>
        <div class="buy_now_button"><a href="#"><i class="fas fa-cart"></i>{{ trans('message.order') }}</a></div>
        <p>Cơm Gà Chiên của cửa hàng Cơm 165 ở 165 Ngô Thì Nhậm. </p>

        {{-- Button share social network --}}
        <div class="addthis_inline_share_toolbox_8dui"></div>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: Content prduct--}}
    
</div>
@endsection
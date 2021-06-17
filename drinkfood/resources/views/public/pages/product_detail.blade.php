@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')
<div class="box_content">

    {{-- Begin: Content product--}}
    @if(count($productDetail) > 0)
    <div class="product_box">    
        <h1>{{$productDetail[0]->name}} <span>({{$productDetail[0]->cat_name}})</span></h1>
        <div class="image_panel"><img src="{{productImage($productDetail[0]->image)}}" alt="CSS Template" width="100" height="150" /></div>
        <ul class="info_product">
            <li>{{ trans('message.store') }}: <a href="#">{{$productDetail[0]->brand}}</a></li>
            <li>{{ trans('message.address') }}: {{$productDetail[0]->address}}</li>
            <li>{{ trans('message.category') }}: {{$productDetail[0]->cat_name}}</li>
            <li>{{ trans('message.user_post') }}: {{$productDetail[0]->user_fullname}}</li>
            <li>{{ trans('message.price') }}: <span class="price">{{number_format($productDetail[0]->price, 0, ',', '.')}} VNĐ</span></li>
            <li>{{ trans_choice('message.user_rating', 1) }}: 
                {!!showRating($productDetail[0]->id)!!}            
            </li>
            <li>
                {{ trans_choice('message.user_rating', 2) }}:
                <div class="rating" id="stars_user_rating" style="display: inline-block">
                    {!!showRatingCurrentUser($productDetail[0]->id)!!}
                </div>
                
                &nbsp;&nbsp;&nbsp;
                <div class="rating" id="star_rating" style="display: none">
                    <a href="javascript:void(0)" id="rating_1" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                    <a href="javascript:void(0)" id="rating_2" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                    <a href="javascript:void(0)" id="rating_3" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                    <a href="javascript:void(0)" id="rating_4" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                    <a href="javascript:void(0)" id="rating_5" class="no_rating" style="color: #fff"><i class="fas fa-star"></i></a>
                    <input type="hidden" id="id_product" value="{{$productDetail[0]->id}}">
                </div>
                <a href="javascript:void(0)" id="btn_ratings">{{ trans('message.btn_ratings') }}</a>
            </li>
        </ul>
        <div class="buy_now_button"><a href="javascript:void(0)" id="btn_add_cat_{{$productDetail[0]->uid}}" onclick="addCart('{{$productDetail[0]->uid}}')">{{ trans('message.add_cart') }}</a></div>
        <p>{{$productDetail[0]->description}} </p>

        {{-- Button share social network --}}
        <div class="addthis_inline_share_toolbox_8dui"></div>
        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    @else
        <img src="{{asset('images/icons/product_not_found.png')}}" class="product_not_found">
        <p class="error">{{ trans('message.not_found') }}</p>
    @endif
    {{-- End: Content prduct--}}
    
</div>
@endsection
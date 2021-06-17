@extends('public/layouts/master_layout')
@section('title', trans('message.product'))
@section('filter_bar')
    @include('public/layouts/elements/filter_bar')
@endsection
@section('content')

{{-- Begin: Box content --}}
<div class="box_content">

    {{-- Begin: content bar --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar"><a href="{{url('/product')}}">{!! trans('message.product')!!}</a>{!!showCategroryTitle($typeCat)!!}</span>
        </div>
    </div>
    {{-- End: content bar --}}

    {{-- Begin: product box --}}
    <div class="product_box">
        @if(count($products) > 0)
          @foreach($products as $product)
            <div class="templatemo_product_box">
                <h1>{{$product->name}} <span>({{$product->brand}})</span></h1>
                <div class="box_img">
                    <a href="{{url('/product'.'/'.$product->cat_url_key.'-'.$product->uid_cat.'/'.$product->url_key.'-'.$product->uid)}}"><img src="{{productImage($product->image)}}" alt="image"></a>
                </div>
                <div class="product_info">
                    <span class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</span>
                    <div class="rating">
                        {!!showRating($product->id)!!}
                    </div>
                    <div class="buy_now_button"><a href="javascript:void(0)" id="btn_add_cat_{{$product->uid}}" onclick="addCart('{{$product->uid}}')">{{ trans('message.add_cart') }}</a></div>
                    <div class="detail_button"><a href="{{url('/product'.'/'.$product->cat_url_key.'-'.$product->uid_cat.'/'.$product->url_key.'-'.$product->uid)}}">{{ trans('message.detail') }}</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
                @if($product->description != "")
                    <div class="product_description">{{$product->description}}</div>
                @endif
            </div>
          @endforeach
        @else
            <div class="blank_page" style="background-image:url({{asset('images/icons/product_not_found.png')}})"></div>
            @endif
    </div>
    {{-- End: product box --}}
    
</div>
{{-- Begin: Box content --}}

{{-- Begin: paginate bar --}}
{{ $products->links("public.layouts.elements.paginate_bar") }}
{{-- End: paginate bar --}}
@endsection
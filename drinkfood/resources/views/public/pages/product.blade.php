@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')

{{-- Begin: Box content --}}
<div class="box_content">

    {{-- Begin: content bar --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.product') }}</span>
        </div>

        <div class="filter">
            <form action="#" method="POST">
                <label>{{ trans('message.filter') }}</label>
                <select name="filter" id="filter">
                    <option value="1">{{ trans_choice('message.filter_type', 1) }}</option>
                    <option value="2">{{ trans_choice('message.filter_type', 2) }}</option>
                    <option value="3">{{ trans_choice('message.filter_type', 3) }}</option>
                    <option value="4">{{ trans_choice('message.filter_type', 4) }}</option>
                    <option value="5">{{ trans_choice('message.filter_type', 5) }}</option>
                </select>
            </form>
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
                    <div class="buy_now_button"><a href="#">{{ trans('message.add_cart') }}</a></div>
                    <div class="detail_button"><a href="{{url('/product'.'/'.$product->cat_url_key.'-'.$product->uid_cat.'/'.$product->url_key.'-'.$product->uid)}}">{{ trans('message.detail') }}</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
                @if($product->description != "")
                    <div class="product_description">{{$product->description}}</div>
                @endif
            </div>
          @endforeach
        @else
            <img src="{{asset('images/icons/product_not_found.png')}}" class="product_not_found">
        @endif
    </div>
    {{-- End: product box --}}
    
</div>
{{-- Begin: Box content --}}

{{-- Begin: paginate bar --}}
{{ $products->links("public.layouts.elements.paginate_bar") }}
{{-- End: paginate bar --}}

@endsection
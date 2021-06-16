@extends('public/layouts/master_layout')
@section('title', 'Trang chủ')
@section('filter_bar')
    @include('public/layouts/elements/filter_bar')
@endsection
@section('content')
<div class="box_content">
    
    {{-- Hiển thị thông báo --}}
    @if (session()->has('send_mail_success'))
        <div class="alert alert-success">
          <p><i class="fas fa-info"></i>
          {{session()->get('send_mail_success')}}
          </p>
        </div>
    @endif

    @if (session()->has('send_mail_error'))
        <div class="alert alert-success">
          <p><i class="fas fa-info"></i>
          {{session()->get('send_mail_error')}}
          </p>
        </div>
    @endif
    {{-- Hiển thị thông báo --}}

    {{-- Begin: Thanh tiêu đề --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.foods') }}</span>
        </div>
    </div>
    {{-- End: Thanh tiêu đề --}}

    {{-- Begin: Danh sách sản phẩm --}}
    <div class="product_box">
        @foreach ($products as $product)
          @if ($product->type == 1)
            <div class="templatemo_product_box">
                <h1>{{$product->name}} <span>({{$product->brand}})</span></h1>
                <div class="box_img">
                    <img src="{{productImage($product->image)}}" alt="image" />
                </div>
                <div class="product_info">
                    <span class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</span>
                    <div class="rating">
                        {!!showRating($product->id)!!}
                    </div>
                    <div class="buy_now_button"><a href="javascript:void(0)" id="btn_add_cat_{{$product->uid}}" onclick="addCart('{{$product->uid}}')">{{ trans('message.order') }}</a></div>
                    <div class="detail_button"><a href="{{url('/product'.'/'.$product->cat_url_key.'-'.$product->uid_cat.'/'.$product->url_key.'-'.$product->uid)}}">{{ trans('message.detail') }}</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
                <div class="product_description">{{$product->description}}</div>
            </div>
          @endif 
        @endforeach
    </div>
    {{-- End: Danh sách sản phẩm --}}
</div>    
    
<div class="box_content">
    {{-- Begin: Thanh tiêu đề --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.drinks') }}</span>
        </div>
    </div>
    {{-- End: Thanh tiêu đề --}}

    {{-- Begin: Danh sách sản phẩm đồ uống--}}
    <div class="product_box">

        @foreach ($products as $product)
          @if ($product->type == 2)
            <div class="templatemo_product_box">
                <h1>{{$product->name}} <span>({{$product->brand}})</span></h1>
                <div class="box_img">
                    <img src="{{productImage($product->image)}}" alt="image" />
                </div>
                <div class="product_info">
                    <span class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</span>
                    <div class="rating">
                        {!!showRating($product->id)!!}
                    </div>
                    <div class="buy_now_button"><a href="javascript:void(0)" id="btn_add_cat_{{$product->uid}}" onclick="addCart('{{$product->uid}}')">{{ trans('message.order') }}</a></div>
                    <div class="detail_button"><a href="{{url('/product'.'/'.$product->cat_url_key.'-'.$product->uid_cat.'/'.$product->url_key.'-'.$product->uid)}}">{{ trans('message.detail') }}</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
                <div class="product_description">{{$product->description}}</div>
            </div>
          @endif 
        @endforeach
    </div>
    {{-- End: Danh sách sản phẩm đồ uống--}}
 
</div>
@endsection

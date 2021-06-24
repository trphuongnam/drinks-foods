@extends('public/layouts/master_layout')
@section('title', trans('message.product'))
@section('content')

{{-- Begin: Box content --}}
<div class="box_content">
    @if (count($searchResult) > 0)
        @foreach($searchResult->groupByType() as $type => $modelSearchResults)
        {{-- @php
            dd($searchResult);
        @endphp --}}
        @if ($type == 'products')
        <div class="content_bar">
            <div class="title_content">
                {{trans('message.product')}}
            </div>
        </div>
        @else
        <div class="content_bar">
            <div class="title_content">
                {{trans('message.category')}}
            </div>
        </div>
        @endif
        <div class="product_box">
        @foreach($modelSearchResults as $searchResult)
        @if ($searchResult->type == 'products')
        <div class="templatemo_product_box">
            <h1>{{$searchResult->searchable['name']}} <span>({{$searchResult->searchable['brand']}})</span></h1>
            <div class="box_img">
                <a href="{{$searchResult->url}}"><img src="{{productImage($searchResult->searchable['image'])}}" alt="image"></a>
            </div>
            <div class="product_info">
                <span class="price">{{number_format($searchResult->searchable['price'], 0, ',', '.')}} VNĐ</span>
                <div class="rating">
                    {!!showRating($searchResult->searchable['id'])!!}
                </div>
                {!!showButtonBuyProduct($searchResult->searchable['uid'])!!}
                <div class="detail_button"><a href="{{$searchResult->url}}">{{ trans('message.detail') }}</a></div>
            </div>
            <div class="cleaner">&nbsp;</div>
            @if($searchResult->searchable['description'] != "")
                <div class="product_description">{{$searchResult->searchable['description']}}</div>
            @endif
        </div>
        @else
        <div class="templatemo_product_box">
            <a href="{{$searchResult->url}}">{{$searchResult->searchable['name']}}</a> - {{$searchResult->searchable['description']}}
        </div>
        @endif
        @endforeach
        </div>

        @endforeach
    @else
        <div class="blank_page" style="background-image:url(http://localhost/Php_nam_P1/drinkfood/public/images/icons/product_not_found.png)">
            <p class="error">{{ trans('message.not_found') }}</p>
        </div>
    @endif
</div>
@endsection
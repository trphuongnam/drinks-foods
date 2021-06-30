@extends('admin.layouts.master_layout')

@section('title', trans('product_lang.manage_product'))

@section('content_title', trans('product_lang.detail_product'))
    
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{$product[0]->name}}</h5>
        </div>
      <div class="card-body">
        <img class="img_form" src="{{productImage($product[0]->image)}}"/>
        <ul>
            <li>{{ trans('message.store') }}: {{$product[0]->brand}}</li>
            <li>{{ trans('message.category') }}: {{$product[0]->cat_name}}</li>
            <li>{{ trans('message.price') }}: {{$product[0]->price}}</li>
            <li>{{ trans('message.rating') }}: <span class="ratings">{!!showRating($product[0]->id)!!}</span></li>
            <li>{{ trans('message.user_post') }}: {{$product[0]->user_fullname}}</li>
        </ul>
        @if ($product[0]->description != "")
        <p class="card-text">
            {{ trans('message.description') }}: {{$product[0]->description}}
        </p>
        @endif
        
        <a href="{{url('admin/product/'.$product[0]->uid.'/edit?act=edit&cat='.$product[0]->id_cat)}}" class="btn btn-primary"><i class="fas fa-edit"></i>{{ trans('message.edit') }}</a>
      </div>
    </div>
  </div>
@endsection
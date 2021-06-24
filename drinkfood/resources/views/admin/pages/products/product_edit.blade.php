@extends('admin.layouts.master_layout')

@section('title', trans('message.manage_product'))

@section('content_title', trans('product_lang.edit_product'))
    
@section('content')
<div class="card">
    <div class="card-header">
      @if (session()->has('save_success'))
        <div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('save_success')}}</div>
      @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if (count($product) > 0)
      <form action="{{url('/admin/product/'.$product[0]->uid)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.pages.products.elements.select_type')
        @include('admin.pages.products.elements.select_category')
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('message.product_name') }} (*) :</label>
              <input type="text" class="form-control" name="name" value="{{$product[0]->name}}">
              @if ($errors->has('name'))
              <p class="text-center bg-warning">{{ trans('product_lang.'.$errors->first('name')) }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('message.store') }}:</label>
              <input type="text" class="form-control" name="brand" value="{{$product[0]->brand}}">
              @if ($errors->has('brand'))
              <p class="text-center bg-warning">{{ trans('product_lang.'.$errors->first('brand')) }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('message.description') }}:</label>
              <textarea class="form-control" rows="3" name="description" >{{$product[0]->description}}</textarea>
              @if ($errors->has('description'))
              <p class="text-center bg-warning">{{ trans('product_lang.'.$errors->first('description')) }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">{{ trans('product_lang.choose_image') }}:</label>
            <img class="img_form" src="{{productImage($product[0]->image)}}" alt="">
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" value="{{$product[0]->image}}" onchange="readURL(this);" id="image" name="image">
                <label class="custom-file-label" for="exampleInputFile"></label>
              </div>
              @if ($errors->has('image'))
                <p class="text-center bg-warning">{{ trans('product_lang.'.$errors->first('image')) }}</p>
                @endif
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('message.price') }} (*) :</label>
              <input type="text" class="form-control" name="price" value="{{$product[0]->price}}">
              @if ($errors->has('price'))
              <p class="text-center bg-warning">{{ trans('product_lang.'.$errors->first('price')) }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- radio -->
            <div class="form-group">
                <label>{{ trans('message.status') }}:</label>
                {!!checkedStatus($product[0]->status)!!}
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-save"></i>{{ trans('message.save') }}</button>
      </form>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
@endsection
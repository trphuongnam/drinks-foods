@extends('admin.layouts.master_layout')

@section('title', trans('category_lang.manager_category'))

@section('content_title', trans('category_lang.edit_category'))
    
@section('content')
<div class="card">
    <div class="card-header">
      @if (session()->has('update_error'))
        <div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('update_error')}}</div>
      @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if (count($category) > 0)
      <form action="{{url('/admin/category'.'/'.$category[0]->uid)}}" method="POST">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('category_lang.type') }}</label>
              <select class="form-control" name="type">
                {!!selectedTypeCat($category[0]->type)!!}
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('category_lang.title') }}</label>
              <input type="text" class="form-control" name="name" value="{{$category[0]->name}}">  
              @if ($errors->has('name'))
                <p class="text-center bg-warning">{{ trans('category_lang.'.$errors->first('name')) }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('message.description') }}:</label>
              <textarea class="form-control" rows="3" name="description">{{$category[0]->description}}</textarea>
              @if ($errors->has('description'))
                <p class="text-center bg-warning">{{ trans('category_lang.'.$errors->first('description')) }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- radio -->
            <div class="form-group">
                <label>{{ trans('message.status') }}:</label>
                {!!checkedStatus($category[0]->status)!!}
            </div>
          </div>
        </div>
        <input name="uid" type="hidden" value="{{$category[0]->uid}}">
        <input name="id" type="hidden" value="{{$category[0]->id}}">
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-save"></i>{{ trans('message.save') }}</button>
      </form>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@extends('admin.layouts.master_layout')

@section('title', trans('category_lang.manager_category'))

@section('content_title', trans('category_lang.add_category'))
    
@section('content')
<div class="card">
    <div class="card-header">
      @if (session()->has('save_success'))
        <div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('save_success')}}</div>
      @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{url('/admin/category')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('category_lang.type') }}</label>
              <select class="form-control" name="type">
                <option value="1">{{ trans('message.'.config('enums.productTypes.1')) }}</option>
                <option value="2">{{ trans('message.'.config('enums.productTypes.2')) }}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>{{ trans('category_lang.title') }}</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}">  
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
              <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
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
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="status" checked>
                    <label class="form-check-label">{{ trans_choice('message.hidden', 1) }}</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="status">
                    <label class="form-check-label">{{ trans_choice('message.hidden', 2) }}</label>
                </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-save"></i>{{ trans('message.save') }}</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
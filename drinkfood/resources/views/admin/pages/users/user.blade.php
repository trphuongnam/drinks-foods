@extends('admin.layouts.master_layout')

@section('title', trans('user_lang.manage_user'))

@section('content_title', trans('user_lang.list_user'))
    
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          @include('admin.pages.users.elements.search_user')
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @include('admin.pages.users.elements.warning')
          <a href="{{url('/admin/user/create')}}" class="btn btn-app" title="{{trans('message.add')}}"><i class="fas fa-plus"></i>{{ trans('message.add') }}</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>{{trans('message.num_order')}}</th>
                  <th>{{trans('message.fullname').' - '.trans('message.username')}}</th>
                  <th>{{ trans('message.status') }}</th>
                  <th>{{ trans('message.option') }}</th>
                </tr>
            </thead>
            <tbody>
                @include('admin.pages.users.elements.list_user')
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <!-- /.col -->
  </div>
@endsection
@extends('admin.layouts.master_layout')

@section('title', 'Quản lý chủ đề bài viết')

@section('content_title',trans('message.category'))
    
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          @include('admin.pages.categories.elements.search_category')
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @include('admin.pages.categories.elements.warning')
          <a href="{{url('/admin/category/create')}}" class="btn btn-app button_header" title="{{trans('message.add')}}"><i class="fas fa-plus"></i>{{trans('message.add')}}</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>{{ trans('message.num_order') }}</th>
                  <th>{{ trans('message.category_name') }}</th>
                  <th>{{ trans('message.description').' - '.trans('message.date_created')}}</th>
                  <th>{{ trans('message.status') }}</th>
                  <th>{{ trans('message.option') }}</th>
                </tr>
            </thead>
            <tbody>
              @include('admin.pages.categories.elements.list_categories')   
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$categories->render('admin.layouts.elements.paginate')}}

      </div>
      <!-- /.card -->
    <!-- /.col -->
  </div>
  <script>
    
  </script>

  @include('admin.pages.categories.elements.detail_categories')
@endsection


@extends('admin.layouts.master_layout')

@section('title', trans('order_lang.manage_order'))

@section('content_title',trans('order_lang.list_order'))
    
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          @include('admin.pages.orders.elements.search_order')
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @include('admin.pages.categories.elements.warning')
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>{{ trans('message.num_order') }}</th>
                  <th>{{ trans('message.order_name') }}</th>
                  <th>{{ trans('order_lang.user_created').' - '.trans('message.date_created') }}</th>
                  <th>{{ trans('message.status') }}</th>
                  <th>{{ trans('message.option') }}</th>
                </tr>
            </thead>
            <tbody>
              @include('admin.pages.orders.elements.list_order')   
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{$orders->render('admin.layouts.elements.paginate')}}

      </div>
      <!-- /.card -->
    <!-- /.col -->
  </div>
  <script>
    
  </script>
@endsection
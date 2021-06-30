@extends('admin.layouts.master_layout')

@section('title', trans('message.manager_product'))

@section('content_title', trans('message.list_products'))
    
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          @include('admin.pages.products.elements.search_product')
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @include('admin.pages.products.elements.warning')
          <a href="{{url('/admin/product/create')}}" class="btn btn-app" title="{{trans('message.add')}}"><i class="fas fa-plus"></i>{{trans('message.add')}}</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{trans('message.num_order')}}</th>
                    <th>{{trans('product_lang.product_name')}}</th>
                    <th>{{trans('message.category')}}</th>
                    <th>{{trans('product_lang.description')}}</th>
                    <th>{{trans('message.status')}}</th>
                    <th>{{trans('message.option')}}</th>
                </tr>
            </thead>
            <tbody>
        
            @if ($products != null)
                @foreach ($products as $product)                
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>
                      {{$product->name}}<br>
                      <img class="img_form" src="{{productImage($product->image)}}" alt="">
                  </td>
                  <td>{{getCategoryName($product->id_cat)}}</td>
                  <td>{{$product->description}}</td>
                  <td>
                    @if ($product->status == 1)
                    <div class="bg-success color-palette"><span>{{ trans_choice('message.hidden', 1) }}</span></div>
                    @else
                    <div class="bg-warning color-palette"><span>{{ trans_choice('message.hidden', 2) }}</span></div>
                    @endif  
                  </td>
                  <td>
                      <a href="{{url('/admin/product'.'/'.$product->uid)}}" class="btn btn-app" title="Chi tiết" id="btn_detail_{{$product->uid}}" onclick="show_detail('{{$product->uid}}')"><i class="fas fa-eye"></i>{{ trans('message.detail') }}</a>
                      <a href="{{url('/admin/product'.'/'.$product->uid.'/edit?act=edit&cat='.$product->id_cat)}}" class="btn btn-app" title="Sửa"><i class="fas fa-edit"></i>{{ trans('message.edit') }}</a>
                      <form action="{{url('/admin/product'.'/'.$product->uid)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" name="delete" class="fas btn btn-app" value="&#xf2ed; {{ trans('message.delete') }}" onClick="return confirm('{{trans('product_lang.delete_confirm')}}');">
                      </form>
                  </td>
                </tr>
                @endforeach
            @endif
                
            </tbody>
          </table>
          {{$products->render('admin.layouts.elements.paginate')}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <!-- /.col -->
  </div>
@endsection
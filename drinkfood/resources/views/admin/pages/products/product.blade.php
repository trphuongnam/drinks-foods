@extends('admin.layouts.master_layout')

@section('title', 'Quản lý sản phẩm')

@section('content_title', 'Sản phẩm')
    
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{url('/admin/product/create')}}" class="btn btn-app" title="Thêm mới"><i class="fas fa-plus"></i>Thêm mới</a>
            
            @if (session()->has('product_success'))
            <div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('product_success')}}</div>
            @endif
            @if (session()->has('delete_success'))
            <div class="alert alert-dangerous alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('delete_success')}}</div>
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            
            {{-- @php
                $url_key = "";
            @endphp
            @if ($product != null)
                @foreach ($product as $item)
                
                @php
                    $style = "";
                    if($item['status'] == 0) $style = "color:gray";   

                    $url_key = $item['url_key'];
                @endphp
                
                <tr style="{{$style}}">
                <td>{{$loop->iteration}}</td>
                <td>
                    {{$item['name']}}<br>
                    <img class="img_form" src="{{asset('/uploads/images')}}/{{$item['image']}}" alt="">
                </td>
                <td>{{$item['description']}}</td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-app" title="Chi tiết" id="btn_detail_{{$item['uid']}}" onclick="show_detail('{{$item['uid']}}')"><i class="fas fa-eye"></i>Chi tiết</a>
                    <a href="{{url('/admin/product/edit/')}}/{{$item['url_key']}}-{{$item['uid']}}" class="btn btn-app" title="Sửa"><i class="fas fa-edit"></i>Sửa</a>
                    <a href="{{url('/admin/product/del/')}}/{{$item['url_key']}}-{{$item['uid']}}" class="btn btn-app" title="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?');"><i class="fas fa-trash-alt"></i>Xóa</a>
                    <a href="javascript:void(0)" class="btn btn-app" title="Ẩn"><i class="fas fa-ban"></i>Ẩn</a>
                </td>
                </tr> --}}
                
                {{-- Phần hiển thị chi tiết sản phẩm --}}
                {{-- @include('admin/pages/product_detail')
                
                @endforeach
            @endif --}}
                
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <!-- /.col -->
  </div>

  {{-- <script>
    /* Hàm show detail sản phẩm */
    function show_detail(uid_product) 
    {   
        if(document.getElementById('box_detail_'+uid_product).style.display == "none")
        {
            document.getElementById('box_detail_'+uid_product).style.display = "block";
            get_post(uid_post);

        }else{
          document.getElementById('box_detail_'+uid_product).style.display = "none";
        }
        
    }

    function get_post(uid)
    {
        $.ajax({
          url: "{{url('/admin/post/p')}}/{{$url_key}}-"+uid,
          cache: false
        })
        .done(function( data ) {
          var status = "Đang hiển thị";
          if(data[0]['status'] == 0) status = "Đang ẩn";

          var dateString = data[0]['created_at'].toLocaleString();

          document.getElementById('title_'+uid).innerHTML = "<h3><span style='text-decoration: underline'>"+data[0]['cat_name']+"</span> - "+data[0]['name']+"<h3>";
          document.getElementById('content_'+uid).innerHTML = "<p>"+data[0]['description']+"</p><p>"+data[0]['content']+"</p>";
          document.getElementById('footer_'+uid).innerHTML = "<p>Ngày viết:"+dateString+"&nbsp;&nbsp;&nbsp;Người viết:"+data[0]['user_fullname']+"&nbsp;&nbsp;&nbsp;Trạng thái: "+status+"</p>";
        });
    }
  </script> --}}
@endsection
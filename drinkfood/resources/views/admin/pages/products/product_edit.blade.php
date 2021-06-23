@extends('admin.layouts.master_layout')

@section('title', 'Quản lý sản phẩm')

@section('content_title', 'Cập Nhật Sản Phẩm')
    
@section('content')
<div class="card">
    <div class="card-header">
      @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible"><i class="icon fas fa-ban"></i> <b>Chú ý:</b> {{ $error }}</div>
        @endforeach
      </ul>
    @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      
        @if ($product != null)
        <form action="{{url('/admin/product/update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                    <label>Tên sản phẩm - dự án:</label>
                    <input type="text" class="form-control" name="name" value="{{$product[0]['name']}}">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" rows="3" name="description" value="">{{$product[0]['description']}}</textarea>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea class="form-control" id="content" rows="3" name="content" value="">{{$product[0]['content']}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Chọn ảnh:</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" value="" id="image" name="image">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                    </div>
                </div>
                <img class="img_form" src="{{asset('uploads/images')}}/{{$product[0]['image']}}" alt="">

            </div>
            <div class="form-group">
                <label for="exampleInputFile">Chọn file:</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" value="" id="file" name="file" multiple>
                    <label class="custom-file-label" for="exampleInputFile"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <!-- radio -->
                <div class="form-group">
                    <label>Trạng thái:</label>
                    
                    @if ($product[0]['status'] == 1)
                    
                    <div class="form-check">    
                        <input class="form-check-input" value="1" type="radio" name="status" checked>
                        <label class="form-check-label">Hiển thị</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="status">
                        <label class="form-check-label">Ẩn</label>
                    </div>

                    @else

                    <div class="form-check">    
                        <input class="form-check-input" value="1" type="radio" name="status" >
                        <label class="form-check-label">Hiển thị</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="status" checked>
                        <label class="form-check-label">Ẩn</label>
                    </div>

                    @endif
                    
                </div>
            </div>
            <input type="hidden" id="product_id" name="id" value="{{$product[0]['id']}}">
            <button type="submit" class="btn btn-app button_header"><i class="fas fa-save"></i>Lưu</button>
        </form>
        @else
            <p>Không tìm thấy nội dung cần sửa</p>
        @endif        
        
    </div>
    <!-- /.card-body -->
  </div>
  @include('/admin/layouts/elements/ckeditorjs')
@endsection
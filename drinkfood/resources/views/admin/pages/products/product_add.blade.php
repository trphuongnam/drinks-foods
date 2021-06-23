@extends('admin.layouts.master_layout')

@section('title', 'Quản lý sản phẩm')

@section('content_title', 'Nhập Sản Phẩm')
    
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
      <form action="{{url('/admin/product/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Tên sản phẩm:</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Mô tả:</label>
              <textarea class="form-control" rows="3" name="description" value="{{old('description')}}"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Nội dung:</label>
                {{-- <textarea class="form-control" id="content" rows="3" name="content" value="{{old('content')}}"></textarea> --}}
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Chọn ảnh:</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" value="{{old('image')}}" id="image" name="image">
                <label class="custom-file-label" for="exampleInputFile"></label>
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Chọn file:</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" value="{{old('file')}}" id="file" name="file" multiple>
                <label class="custom-file-label" for="exampleInputFile"></label>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- radio -->
            <div class="form-group">
                <label>Trạng thái:</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="status" checked>
                    <label class="form-check-label">Hiển thị</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="status">
                    <label class="form-check-label">Ẩn</label>
                </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-save"></i>Lưu</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  {{-- @include('/admin/layouts/elements/ckeditorjs') --}}
@endsection
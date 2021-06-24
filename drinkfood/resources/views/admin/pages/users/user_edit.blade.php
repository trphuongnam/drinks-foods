@extends('admin.layouts.master_layout')

@section('title', trans('user_lang.manage_user'))

@section('content_title', trans('user_lang.edit_user'))
    
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @include('admin.pages.users.elements.warning')
          @include('admin.pages.users.elements.form_edit')
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    <!-- /.col -->
</div>
@endsection
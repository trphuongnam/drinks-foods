@extends('admin.login.master_layout')

@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>Admin</b> NamTP</h1>
        <h3>Reset Password</h3>
      </div>
      <div class="card-body">
        
        @if (session()->get('login_unaccepted'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p><i class="icon fas fa-exclamation-triangle"></i>
          {{session()->get('login_unaccepted')}}
          </p>
        </div>
        @endif
        
        <form action="{{url('admin/pass-reset/checkreset')}}" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nhập email" name="email" value="{{old('email')}}">
          </div>

            @if ($errors->any())
                @foreach($errors->all() as $err)
                    <div class="col-12">
                        {{$err}}
                    </div>
                @endforeach
            @endif
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu <i class="far fa-paper-plane"></i></button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1">
          <a href="{{url('/admin/login')}}">Quay về đăng nhập</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection

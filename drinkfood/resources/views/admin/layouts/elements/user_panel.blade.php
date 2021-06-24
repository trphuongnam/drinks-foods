<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{checkUserAvatar(Auth::user()->avatar, Auth::user()->gender)}}" class="elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="{{url('admin/profile')}}/{{Auth::user()->url_key}}-{{Auth::user()->uid}}" class="d-block">{{Auth::user()->fullname}}</a>
    <a href="{{url('/logout')}}" class="btn"><i class="fas fa-sign-out-alt">Đăng xuất</i></a>
  </div>
</div>

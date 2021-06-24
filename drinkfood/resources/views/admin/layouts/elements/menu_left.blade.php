{{-- Begin: Thanh tìm kiếm --}}
<div class="form-inline">
  <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
      </button>
    </div>
  </div>
</div>
{{-- End: Thanh tìm kiếm --}}

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('/admin')}}" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
        </ul>
      </li>

      {{--Begin: Menu quản lý bài viết --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            {{ trans('message.manager_product') }}
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('/admin/product')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>{{ trans('message.list_products') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/category')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>{{ trans('message.list_categories') }}</p>
            </a>
          </li>
        </ul>
      </li>
        {{--End: Menu quản lý bài viết --}}
      

        {{--Begin: Menu quản lý hình ảnh & album --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            {{ trans('message.manager_order') }}
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/layout/top-nav.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh Sách Đơn Hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh Sách Album</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh Sách Comment</p>
            </a>
          </li>
        </ul>
      </li>
        {{--End: Menu quản lý hình ảnh & album --}}


        {{--Begin: Menu quản lý user --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-user"></i>
          <p>
            {{ trans('message.manager_user') }}
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('/admin/user')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh Sách User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/user-authorize')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Phân Quyền User</p>
            </a>
          </li>
        </ul>
      </li>
        {{--End: Menu quản lý user --}}
    </ul>
  </nav>

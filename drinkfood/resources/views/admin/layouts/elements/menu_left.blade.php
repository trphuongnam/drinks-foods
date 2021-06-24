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

      {{--Begin: Menu manage product and categories --}}
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
        {{--End: Menu manage product and categories--}}
      

        {{--Begin: Menu manage orders --}}
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
            <a href="{{url('/admin/order')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>{{ trans('order_lang.list_order') }}</p>
            </a>
          </li>
        </ul>
      </li>
        {{--End: Menu manage orders--}}


        {{--Begin: Menu manage user --}}
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
              <p>{{ trans('user_lang.list_user') }}</p>
            </a>
          </li>
        </ul>
      </li>
        {{--End: Menu manage user --}}
    </ul>
  </nav>

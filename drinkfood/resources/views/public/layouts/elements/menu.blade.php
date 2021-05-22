<div id="templatemo_menu">
    <ul id="menu_desktop">
        <li><a href="{{url('/')}}" class="current">Trang chủ</a></li>
        <li><a href="{{url('/product')}}">Sản phẩm</a></li>
        <li><a href="{{url('/regist')}}">Đăng ký/Đăng nhập</a></li>            
        <li><a href="{{url('/cart')}}">Giỏ hàng của bạn</a></li>  
        <li><a href="{{url('/contact')}}">Liên hệ</a></li>
    </ul>

    <div id="dropdown">
       <a href="javascript:void(0)" class="btn_show_menu" onclick="show_menu()"><i class="fas fa-bars"></i></a>
       <ul id="menu_dropdown" style="display: none">
            <li><a href="{{url('/')}}" class="current">Trang chủ</a></li>
            <li><a href="{{url('/product')}}">Sản phẩm</a></li>
            <li><a href="{{url('/regist')}}">Đăng ký/Đăng nhập</a></li>            
            <li><a href="{{url('/cart')}}">Giỏ hàng của bạn</a></li>  
            <li><a href="{{url('/contact')}}">Liên hệ</a></li>
        </ul>
    </div>

    <div class="language">
        <a href="javascript:void(0)" class="btn_show_language" onclick="show_language()"><i class="fas fa-language"></i></a>
        <ul id="lang_dropdown" style="display: none">
            <li><a href="{{url()->current()}}/vi">Tiếng Việt</a></li>
            <li><a href="{{url()->current()}}/en">English</a></li>
        </ul>
    </div>
</div> 
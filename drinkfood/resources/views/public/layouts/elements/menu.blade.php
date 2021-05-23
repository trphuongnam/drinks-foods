<div id="templatemo_menu">
    <ul id="menu_desktop">
        <li><a href="{{url('/')}}" class="current">{{ trans('message.home') }}</a></li>
        <li><a href="{{url('/product')}}">{{ trans('message.product') }}</a></li>
        <li><a href="{{url('/regist')}}">{{ trans('message.regist') }}</a></li>            
        <li><a href="{{url('/cart')}}">{{ trans('message.cart') }}</a></li>  
        <li><a href="{{url('/contact')}}">{{ trans('message.contact') }}</a></li>
    </ul>

    <div id="dropdown">
        <a href="javascript:void(0)" class="btn_show_menu" onclick="show_menu()"><i class="fas fa-bars"></i></a>
        <ul id="menu_dropdown" style="display: none">
            <li><a href="{{url('/')}}" class="current">{{ trans('message.home') }}</a></li>
            <li><a href="{{url('/product')}}">{{ trans('message.product') }}</a></li>
            <li><a href="{{url('/regist')}}">{{ trans('message.regist') }}</a></li>            
            <li><a href="{{url('/cart')}}">{{ trans('message.cart') }}</a></li>  
            <li><a href="{{url('/contact')}}">{{ trans('message.contact') }}</a></li>
        </ul>
    </div>

    <div class="language">
        <a href="javascript:void(0)" class="btn_show_language" onclick="show_language()"><i class="fas fa-language"></i></a>
        <ul id="lang_dropdown" style="display: none">
            <li><a href="{{url('/language')}}/vi">Tiếng Việt</a></li>
            <li><a href="{{url('/language')}}/en">English</a></li>
        </ul>
    </div>
</div> 
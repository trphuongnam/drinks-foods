<div id="templatemo_menu">
    <ul id="menu_desktop">
        <li><a data-pjax href="{{url('/')}}" class="current">{{ trans('message.home') }}</a></li>
        <li><a data-pjax href="{{url('/product')}}">{{ trans('message.product') }}</a></li>
        <li style="{!!showProfileLink()['style']!!}"><a data-pjax href="{{url('/sign_in')}}">{{ trans('message.sign_in') }}</a></li>            
        <li><a href="{{url('/cart')}}">{{ trans('message.cart') }}</a></li>  
        {{-- <li><a data-pjax href="{{url('/contact')}}">{{ trans('message.contact') }}</a></li> --}}

        {{-- Get link profile & link logout in Helper --}}
        {!!showProfileLink()['profile_link']!!}
        {!!showProfileLink()['logout_link']!!}
    </ul>

    <div id="dropdown">
        <a href="javascript:void(0)" class="btn_show_menu" onclick="show_menu()"><i class="fas fa-bars"></i></a>
        <ul id="menu_dropdown" style="display: none">
            <li><a data-pjax href="{{url('/')}}" class="current">{{ trans('message.home') }}</a></li>
            <li><a data-pjax href="{{url('/product')}}">{{ trans('message.product') }}</a></li>
            <li><a data-pjax href="{{url('/regist')}}">{{ trans('message.regist') }}</a></li>            
            <li><a href="{{url('/cart')}}">{{ trans('message.cart') }}</a></li>  
            {{-- <li><a data-pjax href="{{url('/contact')}}">{{ trans('message.contact') }}</a></li> --}}
            {!!showProfileLink()['profile_link']!!}
            {!!showProfileLink()['logout_link']!!}
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
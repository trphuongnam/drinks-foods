@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')

{{-- Begin: Box content --}}
<div class="box_content">

    {{-- Begin: content bar --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.sign_in') }}</span>
        </div>
    </div>
    {{-- End: content bar --}}

    {{-- Begin: form regist--}}
    <div class="form_wrapper">
        <form action="{{url('/sign_in')}}" method="POST" id="regist_form" class="form">
            @csrf

            {{-- Begin: Check errors --}}
            @if (session()->has('err_sign_in'))
                <span class="error">{{session()->get('err_sign_in')}}</span>
            @endif

            @if (session()->has('msg_sign_in'))
                <span class="error">{{session()->get('msg_sign_in')}}</span>
            @endif

            @if (session()->has('err_exception'))
                <span class="error">{{session()->get('err_exception')}}</span>
            @endif
            {{-- End: Check errors --}}
            
            <div class="form_group">
                <label for="email" class="title_input">{{ trans('message.email') }}:* </label>
                <input type="text" name="email" id="email" class="form_input" value="{{old('email')}}">
            </div>
            <div class="form_group">
                <label for="password" class="title_input">{{ trans('message.password') }}:* </label>
                <input type="password" name="password" id="password" class="form_input">
            </div>
            <div class="form_group">
                <input type="submit" value="{{ trans('message.sign_in') }}" class="btn btn_regist">
                <a  href="{{route('regist.index')}}" class="link1">{{ trans('message.link_regist') }}</a>
                <a href="{{route('login.facebook')}}" class="btn btn_submit"><i class="fab fa-facebook">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.login_facebook') }}</a>
                <a href="{{route('login.google')}}" class="btn btn_submit"><i class="fab fa-google">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.login_google') }}</a>
            </div>
        </form>
    </div>
    {{-- End: form regist --}}
    
</div>
{{-- Begin: Box content --}}
@include('public/layouts/elements/check_validate')
@endsection
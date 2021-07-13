@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')

{{-- Begin: Box content --}}
<div class="box_content">

    {{-- Begin: content bar --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.reset_password') }}</span>
        </div>
    </div>
    {{-- End: content bar --}}

    {{-- Begin: Get message to system --}}
    @if (session()->has('reset_pass_fail'))
        <span class="error">{{session()->get('reset_pass_fail')}}</span>
    @endif

    @if (session()->has('err_check_mail'))
        <span class="error">{{session()->get('err_check_mail')}}</span>
    @endif

    @if (session()->has('send_mail_error'))
        <span class="error">{{session()->get('send_mail_error')}}</span>
    @endif
    {{-- End: Get message to system --}}

    {{-- Begin: form regist--}}
    <div class="form_wrapper">
        <form action="{{url('/forgot_password')}}" method="POST" id="reset_password_form" class="form form_data">
            @csrf

            <div class="form_group">
                <label for="email" class="title_input">{{ trans('message.email') }}:* </label>
                <input type="text" name="email" id="email" class="form_input" value="{{old('email')}}">
            </div>
            <div class="form_group">
                <a  href="javascript:void(0)" id="forgot_password" class="btn btn_green"><i class="fas fa-paper-plane">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.send_request') }}</a>
                <a href="{{route('sign_in.index')}}" class="btn btn_red"><i class="fas fa-window-close">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.cancel') }}</a>
            </div>
        </form>

    </div>
    {{-- End: form regist --}}

    {{-- Loading bar --}}
    <div class="background_loading">
        <div class="progress-3"></div>
    </div>

</div>
{{-- Begin: Box content --}}
@include('public/layouts/elements/ajax_request')
@endsection
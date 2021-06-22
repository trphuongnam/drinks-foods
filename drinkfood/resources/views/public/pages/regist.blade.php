@extends('public/layouts/master_layout')
@section('title', trans('message.product'))

@section('content')

{{-- Begin: Box content --}}
<div class="box_content">

    {{-- Begin: content bar --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.regist') }}</span>
        </div>
    </div>
    {{-- End: content bar --}}

    {{-- Begin: form regist--}}
    <div class="form_wrapper">
        @foreach ($errors->all() as $message)
            <p class="error">{{$message}}</p><br>
        @endforeach
        <form action="{{url('/regist')}}" method="POST" id="regist_form" class="form form_data">
            @csrf
            <div class="form_group">
                <label for="fullname" class="title_input">{{ trans('message.fullname') }}:* </label>
                <input type="text" name="fullname" id="fullname" class="form_input" value="{{old('fullname')}}">
            </div>
            <div class="form_group" id="select_gender">
                <label for="gender" class="title_input">{{ trans('message.gender') }}:* </label>
                <div class="checkbox">
                    <input type="radio" name="gender" value="1" checked> {{ trans('message.male') }}
                    <input type="radio" name="gender" value="2"> {{ trans('message.female') }}
                    <input type="radio" name="gender" value="3"> {{ trans('message.other') }}
                </div>
            </div>
            <div class="form_group">
                <label for="birthday" class="title_input">{{ trans('message.birthday') }}:* </label>
                <input type="date" name="birthday" id="birthday" class="form_input" value="{{old('birthday')}}">
            </div>
            <div class="form_group">
                <label for="phone" class="title_input">{{ trans('message.phone') }}:*</label>
                <input type="text" name="phone" id="phone" class="form_input" value="{{old('phone')}}">
            </div>
            <div class="form_group">
                <label for="email" class="title_input">{{ trans('message.email') }}:*</label>
                <input type="text" name="email" id="email" class="form_input" value="{{old('email')}}">
            </div>
            <div class="form_group">
                <label for="address" class="title_input">{{ trans('message.address') }}:* </label>
                <input type="text" name="address" id="address" class="form_input" value="{{old('address')}}">
            </div>
            <div class="form_group">
                <label for="username" class="title_input">{{ trans('message.username') }}:* </label>
                <input type="text" name="username" id="username" class="form_input" value="{{old('username')}}">
            </div>
            <div class="form_group">
                <label for="password" class="title_input">{{ trans('message.password') }}:* </label>
                <input type="password" name="password" id="password" class="form_input">
            </div>
            <div class="form_group">
                <label for="re_password" class="title_input">{{ trans('message.re_password') }}:* </label>
                <input type="password" name="re_password" id="re_password" class="form_input">
            </div>
            <div class="form_group">
                <input type="submit" value="{{ trans('message.regist') }}" class="btn btn_regist">
                <a  href="{{url('/sign_in')}}" class="link1">{{ trans('message.link_signin') }}</a>
            </div>
        </form>
    </div>
    {{-- End: form regist --}}
    
</div>
{{-- Begin: Box content --}}
@include('public/layouts/elements/check_validate')
@endsection
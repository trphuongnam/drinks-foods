@extends('public/layouts/master_layout')
@section('title', trans('message.profile'))

@section('content')
<div class="box_content">
    {{-- Begin: content bar --}}
    <div class="content_bar">
        <div class="title_content">
            <span class="title_bar">{{ trans('message.edit_profile') }}</span>
        </div>
    </div>
    {{-- End: content bar --}}

    {{-- Begin: User information edit--}}
    <div class="form_wrapper">
        <form action="{{url('/user')}}/{{$userInfo->uid}}" method="POST" id="edit_user_form" class="form form_data" enctype="multipart/form-data">
            
            {{-- Begin: Show errors --}}
            @if (Session::has('err_update'))
                <span class="error">{{Session::get('err_update')}}</span>
            @endif
            {{-- End: Show errors --}}


            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="form_group">
                <div class="box_img box_avatar">
                    <img src="{{checkUserAvatar($userInfo->image, $userInfo->gender)}}" class="user_avatar img_form" alt="">
                </div>
                <input type="file" name="image" id="avatar" onchange="readURL(this);" class="form_input avatar_input">
            </div>
            <div class="form_group">
                <label for="fullname" class="title_input">{{ trans('message.fullname') }}:* </label>
                <input type="text" name="fullname" id="fullname" class="form_input" value="{{$userInfo->fullname}}">
            </div>
            <div class="form_group" id="select_gender">
                <label for="gender" class="title_input">{{ trans('message.gender') }}:* </label>
                <div class="checkbox">
                    <input type="radio" name="gender" value="1" {{checkGenderUser($userInfo->gender)['gender'][1]}}> {{ trans('message.male') }}
                    <input type="radio" name="gender" value="2" {{checkGenderUser($userInfo->gender)['gender'][2]}}> {{ trans('message.female') }}
                    <input type="radio" name="gender" value="0" {{checkGenderUser($userInfo->gender)['gender'][0]}}> {{ trans('message.other') }}
                </div>
            </div>
            <div class="form_group">
                <label for="birthday" class="title_input">{{ trans('message.birthday') }}:* </label>
                <input type="date" name="birthday" id="birthday" class="form_input" value="{{$userInfo->birthday}}">
            </div>
            <div class="form_group">
                <label for="phone" class="title_input">{{ trans('message.phone') }}:*</label>
                <input type="text" name="phone" id="phone" class="form_input" value="{{$userInfo->phone}}">
            </div>
            <div class="form_group">
                <label for="email" class="title_input">{{ trans('message.email') }}:*</label>
                <input type="text" name="email" id="email" class="form_input" value="{{$userInfo->email}}" readonly>
            </div>
            <div class="form_group">
                <label for="address" class="title_input">{{ trans('message.address') }}:* </label>
                <input type="text" name="address" id="address" class="form_input" value="{{$userInfo->address}}" >
            </div>
            <div class="form_group">
                <label for="username" class="title_input">{{ trans('message.username') }}:* </label>
                <input type="text" name="showusername" id="username" class="form_input" value="{{$userInfo->username}}" readonly>
            </div>
            <div class="form_group">
                <label for="password" class="title_input">{{ trans('message.password') }}:* </label>
                <input type="password" name="showpassword" id="password" class="form_input" value="{{$userInfo->password}}" readonly>
            </div>
            <div class="form_group">
                <input type="submit" value="{{ trans('message.update') }}" id="btn_update_info" class="btn btn_green">
                <a href="javascript:void(0)" id="btn_show_new_password">{{ trans('message.update_password') }}</a>
            </div>
            
            {{showErrorValidate($errors)}}
        </form>
    </div>
    {{-- End: User information edit--}}
    @include('public/pages/elements/update_password_form')
</div>
@include('public/layouts/elements/check_validate')
@endsection
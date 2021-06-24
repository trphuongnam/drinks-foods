@extends('public/layouts/master_layout')
@section('title', trans('message.profile'))
@section('filter_bar')
    @include('public.layouts.elements.filter_order_bar')
@endsection
@section('content')
<div class="box_content">
    
    {{-- Begin: User information--}}
    <div class="product_box">    
        <h1>{{ trans('message.user_info') }}</span></h1>
        <div class="image_panel">
            <img src="{{checkUserAvatar($userInfo->image, $userInfo->gender)}}" alt="CSS Template" width="100" height="150" />
        </div>
        <ul class="info_product">
            <li>{{ trans('message.fullname') }}: {{$userInfo->fullname}}</li>
            <li>{{ trans('message.gender') }}: {{checkGenderUser($userInfo->gender)[0]}}</li>
            <li>{{ trans('message.birthday') }}: {{$userInfo->birthday}}</li>
            <li>{{ trans('message.email') }}: {{$userInfo->email}}</li>
            <li>{{ trans('message.phone') }}: {{$userInfo->phone}}</li>
            <li>{{ trans('message.address') }}: {{$userInfo->address}}</li>
            <li><a href="{{url('user')}}/{{$userInfo->uid}}/edit" class="btn btn_green"><i class="fas fa-edit">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.edit') }}</a></li>
        </ul>

        <div class="cleaner_with_height">&nbsp;</div>
    </div>
    {{-- End: User information--}}
    
    {{-- Begin: History order--}}
    @include('public/pages/elements/histories_order')
    {{-- End: History order--}}

</div>
@endsection
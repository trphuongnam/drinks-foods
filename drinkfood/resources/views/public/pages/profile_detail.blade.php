@extends('public/layouts/master_layout')
@section('title', trans('message.profile'))

@section('content')
<div class="box_content">
    
    {{-- Begin: User information--}}
    <div class="product_box">    
        <h1>{{ trans('message.user_info') }}</span></h1>
        <div class="image_panel">
            <img src="{{checkUserAvatar($userInfo->avatar, $userInfo->gender)}}" alt="CSS Template" width="100" height="150" />
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
    
    {{-- Begin: User information--}}
    <div class="product_box">    
        <h1>{{ trans('message.history_order') }}</span></h1>
        <table border="1">
            <tr>
                <th>{{ trans('message.num_order') }}</th>
                <th>{{ trans('message.order_name') }}</th>
                <th>{{ trans('message.time_order') }}</th>
                <th>{{ trans('message.status') }}</th>
                <th>{{ trans('message.option') }}</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Cơm gà 123 - 182Absu1320</td>
                <td>06/06/2021 - 10:20</td>
                <td>{{ trans_choice('message.status_order', 1)}}</td>
                <td>
                    <a href="#" class="btn btn_green"><i class="fas fa-info-circle">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.detail') }}</a>
                    <a href="#" class="btn btn_green"><i class="fas fa-print">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_print') }}</a>
                    <a href="#" class="btn btn_green"><i class="fas fa-download">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_export') }}</a>
                </td>
            </tr>
        </table>
    </div>
    {{-- End: User information--}}

</div>
@endsection
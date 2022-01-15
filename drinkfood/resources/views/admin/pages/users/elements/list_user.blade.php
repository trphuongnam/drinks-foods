@if (count($users) > 0)
@foreach ($users as $user)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{!!'<b>('.getTypeUser($user->type) .')</b>  '. $user->fullname.' - '.$user->username!!}</td>
    <td>{!!getStatusUser($user->status)!!}</td>
    <td>
        <a href="{{url('/admin/user/'.$user->uid)}}" class="btn btn-app" title="{{trans('message.detail')}}"><i class="fas fa-eye"></i>{{trans('message.detail')}}</a>
        <a href="{{url('/admin/user/'.$user->uid.'/edit')}}" class="btn btn-app" title="{{trans('message.edit')}}"><i class="fas fa-edit"></i>{{trans('message.edit')}}</a>
        <a href="{{url('/admin/user/reset_password/'.$user->email)}}" class="btn btn-app" title="{{trans('message.reset_password')}}"><i class="fas fa-cog"></i>{{trans('message.reset_password')}}</a>
        @if($user->type != 1 && $user->status == 1)
        <a href="{{url('/admin/user/block/'.$user->uid)}}" class="btn btn-app" title="Block" onclick="return confirm('{{__('user_lang.block_confirm')}}');"><i class="fas fa-ban"></i>{{ trans('user_lang.block') }}</a>
        @elseif ($user->status == 2)
        <a href="{{url('/admin/user/unblock/'.$user->uid)}}" class="btn btn-app" title="Block" onclick="return confirm('{{__('user_lang.unblock_confirm')}}');"><i class="fas fa-ban"></i>{{ trans('user_lang.unblock') }}</a>
        @endif
    </td>
</tr>
@endforeach
@endif
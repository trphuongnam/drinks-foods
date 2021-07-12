@if (count($categories) > 0)
    @foreach ($categories as $category)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{trans('message.'.config('enums.productTypes.'.$category->type)).' / '.$category->name}}</td>
        <td>
            @if ($category->description != "")
                {!! "<i>".$category->description."</i></br>"!!}
            @endif
            {!! "<b>".date('d-m-Y', strtotime($category->created_at))."</b>"!!}
        </td>
        <td>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="cat_display_{{$category->uid}}" onclick="changeStatusCat('{{$category->uid}}')" status={{$category->status}} {{($category->status == 1) ? 'checked' : ''}}>
                <label class="custom-control-label" for="cat_display_{{$category->uid}}" id="msg_status_{{$category->uid}}">{{ trans_choice('message.hidden', $category->status) }}</label>
            </div>
        </td>
        <td>
            <a href="javascript:void(0)" class="btn btn-app show_product_cat" id="show_product_cat_{{$category->id}}" title="{{trans('message.detail')}}" onclick="showDialog({{$category->id}})"><i class="fas fa-eye"></i>{{trans('message.detail')}}</a>
            <a href="{{url('/admin/category'.'/'.$category->uid.'/edit')}}" class="btn btn-app" title="{{trans('message.edit')}}"><i class="fas fa-edit"></i>{{ trans('message.edit') }}</a>
            <form action="{{url('/admin/category'.'/'.$category->uid)}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" name="delete" class="fas btn btn-app" value="&#xf2ed; {{ trans('message.delete') }}" onClick="return confirm('Bạn có chắc chắn muốn xóa chủ đề này không?');">
            </form>
            
        </td>
    </tr>
    @endforeach
@else
    <tr><td colspan=5 class="text-center">{{ trans('message.no_categories_yet') }}</td></tr>
@endif 
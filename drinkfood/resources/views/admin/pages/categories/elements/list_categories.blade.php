@if (count($categories) > 0)
    @foreach ($categories as $category)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{trans('message.'.config('enums.productTypes.'.$category->type)).' / '.$category->name}}</td>
        <td>{{$category->description}}</td>
        <td>
            {{date('d-m-Y', strtotime($category->created_at))}}
            @if ($category->status == 1)
            <div class="bg-success color-palette"><span>{{ trans_choice('message.hidden', 1) }}</span></div>
            @else
            <div class="bg-warning color-palette"><span>{{ trans_choice('message.hidden', 2) }}</span></div>
            @endif
        </td>
        <td>
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
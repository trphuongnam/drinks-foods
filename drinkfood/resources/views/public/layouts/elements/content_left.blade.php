<div id="templatemo_content_left">
    <div class="templatemo_content_left_section">
        <a href="{{url('/product/do-an-1')}}"><h1>{{ trans('message.foods') }}</h1></a>
        <ul>
            @foreach (showCategory() as $category)
              @if($category->type == 1)
                <li><a href="{{url('/product'.'/'.$category->url_key.'-'.$category->uid)}}">{{$category->name}}</a></li>
              @endif
            @endforeach
        </ul>
    </div>
    <div class="templatemo_content_left_section">
        <a href="{{url('/product/do-uong-2')}}"><h1>{{ trans('message.drinks') }}</h1></a>
        <ul>
            @foreach (showCategory() as $category)
              @if($category->type == 2)
                <li><a href="{{url('/product'.'/'.$category->url_key.'-'.$category->uid)}}">{{$category->name}}</a></li>
              @endif
            @endforeach
        </ul>
    </div>
</div>
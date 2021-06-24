<form action="{{url('/search')}}" method="GET">
    <input type="text" name="search" id="search" value="{{request()->search}}">
    <button type="submit">{{ trans('message.search') }}</button>
</form>
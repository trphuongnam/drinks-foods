<form action="{{url('/admin/user')}}" method="GET">
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('user_lang.search_by') }}</label>
                <select class="form-control" name="searchtype">
                    {!!selectedSearchType(request()->searchtype)!!}
                </select>  
            </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>{{ trans('message.search') }}</label>
            <input type="text" class="form-control" name="content" value="{{request()->content}}">  
          </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('user_lang.type_user') }}</label>
                <select class="form-control" name="type" id="select_type">
                    {!!selectedTypeUser(request()->type)!!}
                </select> 
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('message.status') }}</label>
                <select class="form-control" name="status">
                    {!!selectedStatusUser(request()->status)!!}
                </select>  
            </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-search"></i>{{ trans('message.search') }}</button>
    </div>
</form>
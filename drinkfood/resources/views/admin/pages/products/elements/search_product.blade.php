<form action="{{url('/admin/product')}}" method="GET">
    <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label>{{ trans('message.search') }}</label>
            <input type="text" class="form-control" name="content" value="{{request()->content}}">  
          </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('category_lang.type') }}</label>
                <select class="form-control" name="type" id="select_type">
                    {!!selectedTypeSearch(request()->type)!!}
                </select> 
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
              <label>{{ trans('message.category') }}</label>
              <select class="form-control" name="category" id="category">
                <option value="0">{{ trans('message.all') }}</option>
              </select>
            </div>
          </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('message.status') }}</label>
                <select class="form-control" name="status">
                    {!!selectedStatus(request()->status)!!}
                </select>  
            </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-search"></i>{{ trans('message.search') }}</button>
    </div>
</form>
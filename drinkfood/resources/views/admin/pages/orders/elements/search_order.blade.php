<form action="{{url('/admin/order')}}" method="GET">
    <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>{{ trans('message.search') }}</label>
            <input type="text" class="form-control" name="content" value="{{request()->content}}">  
          </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('order_lang.date_from') }}</label>
                <input type="date" name="start_date" value="{{request()->start_date}}"> 
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('order_lang.date_to') }}</label>
                <input type="date" name="end_date" value="{{request()->end_date}}"> 
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('message.status') }}</label>
                <select class="form-control" name="status">
                    {!!selectedStatusOrder(request()->status)!!}
                </select>  
            </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-search"></i>{{ trans('message.search') }}</button>
    </div>
</form>
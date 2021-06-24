<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label>{{ trans('category_lang.type') }}</label>
        <select class="form-control" name="type" id="select_type">
            @if (request()->filled('act') and request()->act == "edit")
                {!!displayOptionType($product[0]->type)!!}
            @else
                {!!displayOptionType(1)!!}
            @endif
        </select>
      </div>
    </div>
</div>
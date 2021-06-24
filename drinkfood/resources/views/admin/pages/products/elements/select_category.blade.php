<div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label>{{ trans('message.category') }}</label>
        <select class="form-control" name="category" id="category">
          @php
              if(request()->filled('cat')) $idCat = request()->cat;
              else $idCat = 1;
          @endphp
          {!!displayOptionSelectCategory($categories, $idCat)!!}
        </select>
      </div>
    </div>
  </div>
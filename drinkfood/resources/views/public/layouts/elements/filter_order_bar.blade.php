<div class="templatemo_content_left_section">
    <h4>{{ trans('message.history_order') }}</h4>
    <form action="{{url()->current()}}" method="get" id="filter">
      {{-- Box search --}}
      <div class="form_group">
        <label for="search">{{ trans('message.search') }}</label><br>
        <input type="text" name="search" class="form_input" value="{{ request()->search }}" placeholder="{{trans('message.search')}}">
      </div>
      
      {{-- status filter --}}
      <div class="form_group">
        <label for="order">{{ trans('message.status') }}</label><br>
        <select name="status" id="order_filter" class="fas form_input">
          {!!selectedStatusOrder( request()->status )!!}    
        </select>
      </div>
      {{-- date_order filter --}}
      <div class="form_group">
        <label>{{ trans('message.time_order') }}</label><br>
        <input type="date" name="date_order" class="form_input input_filter price_input" value="{{ request()->date_order }}" min="1000" placeholder="{{trans('message.time_order')}}">
      </div>
      <button data-pjax type="submit" class="btn">{{ trans('message.accept') }}</button>
    </form>
</div>
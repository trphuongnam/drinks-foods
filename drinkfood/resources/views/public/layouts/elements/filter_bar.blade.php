<div class="templatemo_content_left_section">
    <h4>{{ trans('message.filter_product') }}</h4>
    <form action="{{url('/product').'/'.$cat_key}}" method="get" id="filter">
      {{-- Box search --}}
      <div class="form_group">
        <label for="search">{{ trans('message.search') }}</label><br>
        <input type="text" name="search" class="form_input" value="{{ request()->get('search') }}" placeholder="{{trans('message.search')}}">
      </div>
      
      {{-- Order filter --}}
      <div class="form_group">
        <label for="order">{{ trans('message.choose_sort_order') }}</label><br>
        <select name="order" id="order_filter" class="fas form_input">
          <option value="">{{ trans('message.choose_sort_order') }}</option>
          {!!showSelectBoxOrder(request()->order)!!}    
        </select>
      </div>
      {{-- price filter --}}
      <div class="form_group">
        <label for="price_filter">{{ trans('message.price') }}</label><br>
        <input type="number" name="price_start" class="form_input input_filter price_input" value="{{ request()->get('price_start') }}" min="1000" placeholder="{{trans('message.start_price')}}">
        <input type="number" name="price_end" class="form_input input_filter price_input" value="{{ request()->get('price_end') }}" min="1000" placeholder="{{trans('message.end_price')}}">
      </div>

      {{-- Ratings filter --}}
      <div class="form_group">
        <label for="ratings">{{ trans('message.rating') }}</label><br>
        <select name="rating" id="rating_filter" class="fas form_input">
          <option value="" selected>--{{ trans('message.choose_rating') }}--</option>
          {!!showSelectBoxRatingFilter(request()->rating)!!}
        </select>
      </div>
      <button data-pjax type="submit" class="btn">{{ trans('message.accept') }}</button>
    </form>
</div>
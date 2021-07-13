<div class="popup" id="popup_login">
    @if (Auth::check() == false)
        <p>
            <a href="{{url('/sign_in')}}">{{ trans('message.sign_in') }}</a>
            {{ trans('message.message_popup') }}
        </p>
    @endif
</div>
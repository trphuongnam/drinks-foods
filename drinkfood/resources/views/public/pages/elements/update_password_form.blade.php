<div id="dialog" style="display: none" title="Basic dialog">
  {{showErrorValidate($errors)}}
  <form action="{{url('/profile/edit_pass')}}" method="POST">
    @csrf
    <h2>CẬP NHẬT MẬT KHẨU</h2>
    <div class="form_group">
      <label for="password" class="title_input">{{ trans('message.new_password') }}:* </label>
      <input type="password" name="password" id="newpassword" class="form_input" value>
    </div>
    <div class="form_group">
      <label for="password" class="title_input">{{ trans('message.re_password') }}:* </label>
      <input type="password" name="repassword" id="repassword" class="form_input" value="">
    </div>
    <div class="form_group">
      <input type="submit" value="{{ trans('message.update') }}" class="btn btn_green">
      <a href="javascript:void(0)" class="btn btn_red cancel_dialog">{{ trans('message.cancel') }}</a>
    </div>
  </form>
</div>
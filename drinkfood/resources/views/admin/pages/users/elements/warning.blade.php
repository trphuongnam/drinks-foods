@if(Session::has('block_success'))
<div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('block_success')}}</div>
@endif  

@if(Session::has('block_error'))
<div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('block_error')}}</div>
@endif  

@if(Session::has('save_user_success'))
<div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('save_user_success')}}</div>
@endif  

@if(Session::has('save_user_error'))
<div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('save_user_error')}}</div>
@endif  

@if(Session::has('update_success'))
<div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('update_success')}}</div>
@endif  

@if(Session::has('update_error'))
<div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('update_error')}}</div>
@endif  

@if (session()->has('reset_pass_success'))
    <div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('reset_pass_success')}}</div>
@endif

@if (session()->has('err_check_mail'))
    <div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('err_check_mail')}}</div>
@endif

@if (session()->has('send_mail_error'))
    <div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('send_mail_error')}}</div>
@endif
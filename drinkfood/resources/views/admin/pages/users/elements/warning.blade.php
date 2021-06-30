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
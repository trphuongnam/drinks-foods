@if (session()->has('delete_success'))
<div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('delete_success')}}</div>
@endif
@if (session()->has('delete_error'))
<div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('delete_error')}}</div>
@endif
@if (session()->has('update_success'))
<div class="alert alert-success alert-dismissible"><i class="icon fas fa-check"></i> {{session()->get('update_success')}}</div>
@endif
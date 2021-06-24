@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    @foreach ($errors->all() as $item)
    <p><i class="icon fas fa-exclamation-triangle"></i>
    {{ trans('message.'.$item) }}
    </p>
    @endforeach
</div>
@endif
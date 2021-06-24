<form class="form-horizontal form_data" action="{{url('admin/user')}}" method="POST">
    @csrf
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">{{ trans('message.fullname') }}</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fullname" name="fullname" value="{{old('fullname')}}" placeholder="{{ trans('message.fullname') }}">
        @if ($errors->has('fullname'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('fullname')) }}</p>
        @endif  
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">{{ trans('message.gender') }}</label>
      <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="gender" checked>
            <label class="form-check-label">{{ trans('message.male') }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="2" type="radio" name="gender">
            <label class="form-check-label">{{ trans('message.female') }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="3" type="radio" name="gender">
            <label class="form-check-label">{{ trans('message.other') }}</label>
            @if ($errors->has('gender'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('gender')) }}</p>
            @endif
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName2" class="col-sm-2 col-form-label">{{ trans('message.birthday') }}</label>
      <div class="col-sm-10">
        <input type="date" name="birthday" class="form-control" id="date" value="{{old('birthday')}}">
        @if ($errors->has('birthday'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('birthday')) }}</p>
       @endif  
    </div>
    </div>
    <div class="form-group row">
      <label for="inputExperience" class="col-sm-2 col-form-label">{{ trans('message.phone') }}</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
        @if ($errors->has('phone'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('phone')) }}</p>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.email') }}</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
        @if ($errors->has('email'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('email')) }}</p>
        @endif  
      </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.address') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{old('address')}}">
            @if ($errors->has('address'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('address')) }}</p>
          @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.username') }}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{old('username')}}">
            @if ($errors->has('username'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('username')) }}</p>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.password') }}</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password" placeholder="password" value="">
            @if ($errors->has('password'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('password')) }}</p>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.re_password') }}</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Re password" value="">
            @if ($errors->has('re_password'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('re_password')) }}</p>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('user_lang.type_user') }}</label>
        <div class="col-sm-10">
            <select name="type" id="type">
                {!!selectedTypeUser(request()->type)!!}
            </select>
            @if ($errors->has('type_user'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('type_user')) }}</p>
            @endif
        </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>
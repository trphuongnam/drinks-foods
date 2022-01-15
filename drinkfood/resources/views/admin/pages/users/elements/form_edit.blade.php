<form class="form-horizontal form_data" action="{{url('admin/user/'.$users[0]->uid)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">{{ trans('message.fullname') }} (*)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fullname" name="fullname" value="{{$users[0]->fullname}}" placeholder="{{ trans('message.fullname') }}">
        @if ($errors->has('fullname'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('fullname')) }}</p>
        @endif  
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">{{ trans('message.gender') }}(*)</label>
      <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="gender" {{($users[0]->gender == 1) ? 'checked' : ""}}>
            <label class="form-check-label">{{ trans('message.male') }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="2" type="radio" name="gender"  {{($users[0]->gender == 2) ? 'checked' : ""}}>
            <label class="form-check-label">{{ trans('message.female') }}</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="3" type="radio" name="gender"  {{($users[0]->gender == 3) ? 'checked' : ""}}>
            <label class="form-check-label">{{ trans('message.other') }}</label>
            @if ($errors->has('gender'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('gender')) }}</p>
            @endif
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName2" class="col-sm-2 col-form-label">{{ trans('message.birthday') }}(*)</label>
      <div class="col-sm-10">
        <input type="date" name="birthday" class="form-control" id="date" value="{{$users[0]->birthday}}">
        @if ($errors->has('birthday'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('birthday')) }}</p>
       @endif  
    </div>
    </div>
    <div class="form-group row">
      <label for="inputExperience" class="col-sm-2 col-form-label">{{ trans('message.phone') }}(*)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="phone" id="phone" value="{{$users[0]->phone}}">
        @if ($errors->has('phone'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('phone')) }}</p>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.email') }}(*)</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$users[0]->email}}">
        @if ($errors->has('email'))
        <p class="text-center bg-warning">{{ trans('message.'.$errors->first('email')) }}</p>
        @endif  
      </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.address') }}(*)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{$users[0]->address}}">
            @if ($errors->has('address'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('address')) }}</p>
          @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.username') }}(*)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{$users[0]->username}}">
            @if ($errors->has('username'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('username')) }}</p>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputFile">{{ trans('product_lang.choose_image') }}:</label>
        <img class="img_form" src="{{checkUserAvatar($users[0]->image, $users[0]->gender)}}" alt="">
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" value="{{$users[0]->image}}" onchange="readURL(this);" id="image" name="image">
            <label class="custom-file-label" for="exampleInputFile"></label>
          </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('user_lang.type_user') }}(*)</label>
        <div class="col-sm-10">
            <select name="type" id="type">
                {!!selectedTypeUser($users[0]->type)!!}
            </select>
            @if ($errors->has('type_user'))
            <p class="text-center bg-warning">{{ trans('message.'.$errors->first('type_user')) }}</p>
            @endif
        </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">{{ trans('message.save') }}</button>
      </div>
    </div>
  </form>
@extends('admin.layouts.master_layout')

@section('title', trans('user_lang.manage_user'))

@section('content_title', trans('user_lang.information'))
@section('content')
  @if (count($users) > 0)
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{checkUserAvatar($users[0]->image, $users[0]->gender)}}" alt="User profile picture">
          </div>
          <h3 class="profile-username text-center">{{$users[0]->fullname}}</h3>
          <p class="text-muted text-center">{{getTypeUser($users[0]->type)}}</p>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">{{ trans('user_lang.information') }}</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="settings">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">{{ trans('message.fullname') }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{$users[0]->fullname}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">{{ trans('message.username') }}</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Username" value="{{$users[0]->username}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">{{ trans('message.gender') }}</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Username" value="{{checkGenderUser($users[0]->gender)[0]}}" readonly>
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.address') }}</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="address" value="{{$users[0]->address}}" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">{{ trans('message.birthday') }}</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills" value="{{date('d/m/Y', strtotime($users[0]->birthday))}}" readonly>
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">{{ trans('message.email') }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName2" placeholder="Email" value="{{$users[0]->email}}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputExperience" class="col-sm-2 col-form-label">{{ trans('message.phone') }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName2" placeholder="Email" value="{{$users[0]->phone}}" readonly>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="alert alert-warning alert-dismissible"><i class="icon fas fa-check"></i> {{trans('user_lang.user_not_found')}}</div>
  @endif
@endsection
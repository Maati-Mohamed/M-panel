@extends('layouts.dashboard.app')
@section('content')

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">@lang('Website')</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('Change Password')</button>
  </li>
  <!-- <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
  </li> -->
</ul>

<div class="tab-content" id="pills-tabContent">
  <!-- Website -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <ul class="list-group">
      <form>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">@lang('Website Name')</label>
              <input type="text" class="form-control" name="name" value="{{ $config->websiteName }}" disabled>
            </div>

          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('Email')</label>
              <input type="email" name="email" value="{{ $config->email }}" class="form-control" aria-describedby="emailHelp" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('Logo')</label>
              <input type="file" class="form-control" name="photo" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('Address')</label>
              <input type="text" class="form-control" name="address" value="{{ $config->address }}" disabled>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('Photo')</label>
              <input type="file" class="form-control" name="photo" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('phone')</label>
              <input type="text" class="form-control" value="{{ $config->phone }}" name="phone" disabled>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">@lang('Discription')</label>
          <textarea name="description" class="form-control" disabled>
          {{ $config->description }}
          </textarea>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('Main Color')</label>
              <input type="color" name="main-color" value="{{ $config->mainColor }}" disabled>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="" class="form-label">@lang('Miner Color')</label>
              <input type="color" name="miner-color" id="" value="{{ $config->minerColor }}" disabled>
            </div>
          </div>
        </div>
        <a href="{{ route('dashboard.configs.edit',$config->id) }}" class="btn btn-primary">@lang('Generate Changes')</a>
      </form>
    </ul>
  </div>
  <!-- Website -->
  <!-- Change Password -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form class="w-50" action="password" method="post">
      @csrf 
      @method('put')
      <input type="hidden" name="id" value="{{ auth()->user()->id }}">
      <div class="mb-3">
        <label for="old_pasword" class="form-label">@lang('Old Password')</label>
        <input type="password" class="form-control" name="old_password" id="old_pasword">
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">@lang('New Password')</label>
        <input type="password" class="form-control" name="new_password" id="new_password">
      </div>
      <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">@lang('New Password Confirmation')</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
      </div>
      <button type="submit" class="btn btn-primary">@lang('Edit')</button>
    </form>

  </div>
  <!-- Change Password -->
  <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div> -->
</div>

@endsection


<!-- onclick="event.preventDefault();document.getElementById('delete').submit(); -->
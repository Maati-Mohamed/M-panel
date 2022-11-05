@extends('layouts.dashboard.app')

@section('content')

@if(session()->has('error'))
    <div class="alert alert-danger text-center">
         {{ session()->get('error') }}
    </div>
@endif
 <!-- Change Password -->
 <div class="d-flex justify-content-center w-100">
    <form class="theme p-3" action="password" method="post">
      @csrf 
      @method('put')
      <input type="hidden" name="id" value="{{ auth()->user()->id }}">
      <div class="mb-3">
        <label for="old_pasword" class="form-label">@lang('Old Password')</label>
        <x-form.input type="password" name="old_password"/>
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">@lang('New Password')</label>
        <x-form.input type="password" name="new_password"/>

      </div>
      <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">@lang('New Password Confirmation')</label>
        <x-form.input type="password" name="new_password_confirmation"/>

      </div>
      <button type="submit" class="btn MyBtn">@lang('Edit')</button>
    </form>

  </div>
  <!-- Change Password -->
@endsection
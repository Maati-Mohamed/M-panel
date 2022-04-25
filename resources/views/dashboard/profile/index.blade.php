@extends('layouts.dashboard.app')
@section('content')

<div class="row">
  <div class="col-lg-3">
    <div class="pro-image">
        <img src="{{ $admin->image_path }}" class="img-thumbnail" alt="admin">
    </div>
  </div>
  <div class="col-lg-9">
    <ul class="list-group">
      <li class="list-group-item"> @lang('Name') : <span class="mx-4 text-muted">{{ $admin->name }}</span></li>
      <li class="list-group-item">@lang('Email') : <span class="mx-4 text-muted">{{ $admin->email }}</span></li>
      <li class="list-group-item">@lang('Age') : <span class="mx-4 text-muted"> {{ $admin->age }}</span></li>
      <li class="list-group-item">@lang('Gender') : <span class="mx-4 text-muted">{{ $admin->gender }}</span></li>
      <li class="list-group-item">@lang('Brithday') : <span class="mx-4 text-muted">{{ $admin->brithday }}</span></li>
      <li class="list-group-item">@lang('Address') : <span class="mx-4 text-muted">{{ $admin->address }}</span></li>
    </ul>
    <a href="{{ route('dashboard.profile.edit',$admin->id) }}" class="btn btn-dark my-2"> 
    <i class="bi bi-pencil-square"></i>
    @lang('Edit Information')
  </a>
  </div>

</div>

@endsection



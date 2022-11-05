@extends('layouts.dashboard.app')
@section('content')

<div class="row mx-3">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-lg-9">
        <h3 class="text-center text-muted">@lang('Edit user')</h3>
        <form class="theme p-4" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">@lang('First Name')</label>
                        <x-form.input name="first_name" :value="$user->first_name" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">@lang('Last Name')</label>
                        <x-form.input name="last_name" :value="$user->last_name" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">@lang('Email')</label>
                        <x-form.input type="email" name="email" :value="$user->email" />

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">@lang('Password')</label>
                        <x-form.input type="password" name="password" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">@lang('Photo')</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="" class="form-label">@lang('Roles')</label>
                        <select class="form-control select2-select" name="roles[]">
                            @foreach($roles as $role)
                            <option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->display_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg w-100 m-2 MyBtn">@lang('Edit')</button>

            </div>
        </form>
    </div>
</div>

@endsection
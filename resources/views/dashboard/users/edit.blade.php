@extends('layouts.dashboard.app')
@section('content')
<div class="user-form mt-4">

    <form action="{{ route('dashboard.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('Name')</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Email')</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="mb-3">
                            <label for="file" class="form-label">@lang('Photo')</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center mt-3 mb-md-2">
                        <img src="{{ $user->image_path }}" class="img-thumbnail img-responsive">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                    <label for="role" class="form-label">@lang('Role')</label>
                    <select id="role" class="form-select" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                             @foreach($user->roles as $user_role)
                                @if($user_role->id == $role->id)
                                    selected
                                @endif
                             @endforeach
                            >
                                {{ $role->name }}
                            </option>
                        @endforeach
                        
                    </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-1">@lang('Edit')</button>
    </form>
</div>
@endsection
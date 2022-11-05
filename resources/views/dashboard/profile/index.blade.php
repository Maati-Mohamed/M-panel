@extends('layouts.dashboard.app')
@section('content')

<div class="row mx-3">
    <div class="col-lg-3">
        <div class="admin-image">
            <img src="{{ $admin->image_path }}" class="img-thumbnail" alt="admin">
        </div>
    </div>
    <div class="col-lg-9">
        <ul class="list-group">
            <form action="{{ route('admin.profile.update',$admin->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <!-- <input type="hidden" name="id" value="{{ $admin->id }}"> -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">@lang('First Name')</label>
                            <input type="text" class="form-control" name="first_name" value="{{$admin->first_name}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">@lang('Last Name')</label>
                            <input type="text" class="form-control" name="last_name" value="{{$admin->last_name}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Email')</label>
                            <input type="email" name="email" value="{{$admin->email}}" class="form-control">
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
                            <label for="" class="form-label">@lang('Address')</label>
                            <input type="text" class="form-control" name="address" value="{{ $admin->address }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Gender')</label> :
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option value="male" {{ $admin->gender == 'male' ? 'selected' : '' }}>@lang('Male')</option>
                                <option value="female" {{ $admin->gender == 'female' ? 'selected' : '' }}>@lang('Female')</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg w-100 m-2 MyBtn">@lang('Edit')</button>

                </div>
            </form>
        </ul>
    </div>
</div>

@endsection
@extends('layouts.dashboard.app')
@section('content')
<div class="admin-form mt-4">

    <form action="{{ route('dashboard.admins.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('Name')</label>
                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Email')</label>
                    <input type="text" name="email" class="form-control" value="{{ $admin->email }}">

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
                        <img src="{{ $admin->image_path }}" class="img-thumbnail img-responsive">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-1">@lang('Edit')</button>
    </form>
</div>
@endsection
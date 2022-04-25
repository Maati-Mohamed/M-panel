@extends('layouts.dashboard.app')
@section('content')
<p>admin</p>
<div class="user-form">
    <form action="{{ route('dashboard.admins.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('Name')</label>
                    <input type="text" class="form-control" name="name">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Email')</label>
                    <input type="text" name="email" class="form-control">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Password')</label>
                    <input type="password" name="password" class="form-control">

                </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
                    <label for="file" class="form-label">@lang('Photo')</label>
                    <input type="file" name="photo" class="form-control">

            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">@lang('Add')</button>
    </form>
</div>
@endsection
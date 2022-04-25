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
            <form action="{{ route('dashboard.profile.update',$admin->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <!-- <input type="hidden" name="id" value="{{ $admin->id }}"> -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$admin->name}}">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" value="{{$admin->email}}" class="form-control" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Age</label>
                            <input type="number" class="form-control" value="{{$admin->age}}" name="age" value="{{$admin->address }}">
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Brithday')</label>
                    <input type="date" class="form-control" name="brithday" value="{{$admin->brithday}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Address')</label>
                    <input type="text" class="form-control" name="address" value="{{ $admin->address }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Gender')</label> : 
                    <select class="form-select" name="gender" aria-label="Default select example">                        
                        <option value="male">@lang('Male')</option>
                        <option value="female">@lang('Female')</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">@lang('Edit')</button>
            </form>
        </ul>
    </div>
</div>
@endsection
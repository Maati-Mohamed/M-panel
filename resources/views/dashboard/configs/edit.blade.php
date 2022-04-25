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
<!-- Website -->
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <ul class="list-group">
            <form action="{{ route('dashboard.configs.update',$config->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">@lang('Website Name')</label>
                            <input type="text" class="form-control" name="websiteName" value="{{ $config->websiteName }}">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Email')</label>
                            <input type="email" name="email" value="{{ $config->email }}" class="form-control" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Logo')</label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Address')</label>
                            <input type="text" class="form-control" name="address" value="{{ $config->address }}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Photo')</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('phone')</label>
                            <input type="number" class="form-control" name="phone" value="{{ $config->phone }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">@lang('Discription')</label>
                    <textarea name="description" class="form-control">
                    {{ $config->description }}
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Main Color')</label>
                            <input type="color" name="mainColor" value="{{ $config->mainColor }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">@lang('Miner Color')</label>
                            <input type="color" name="minerColor" value="{{ $config->minerColor }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">@lang('Edit')</button>
            </form>
        </ul>
    </div>
    <!-- Website -->
    <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div> -->
    <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div> -->
</div>

@endsection


<!-- onclick="event.preventDefault();document.getElementById('delete').submit(); -->
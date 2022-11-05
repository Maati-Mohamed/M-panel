@extends('layouts.dashboard.app')
@section('content')

<div class="settings-wrapper">
    <div class="settings-content p-2  mb-3">
        <div class="settings-header">
            <p class="fs-3">@lang('Basics Settings')</p>
        </div>
        <div class="settings-form theme p-4">
            <form action="{{ route('admin.settings.update',$settings) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-2">
                    <label for="">@lang('Website Name')</label>
                    <x-form.input name="website_name" :value="$settings->website_name" />
                </div>
                <div class="mb-2">
                    <label for="">@lang('Website Logo')</label>
                    <input type="file" name="website_logo" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">@lang('Website Icon')</label>
                    <input type="file" name="website_icon" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">@lang('Website Cover')</label>
                    <input type="file" name="website_cover" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">@lang('Website Bio')</label>
                    <x-form.input name="website_bio" :value="$settings->website_bio" />
                </div>
                <div class="mb-2">
                    <label for="">@lang('Address')</label class="form-control">
                    <x-form.input name="address" :value="$settings->address" />
                </div>
        </div>
    </div>

    <div class="settings-content p-2 mb-3">
        <div class="settings-header">
            <p class="fs-3">@lang('Contact Settings')</p>
        </div>
        <div class="settings-form p-4 theme">
            <div class="mb-2">
                <label for="">@lang('Email')</label>
                <x-form.input name="contact_email" :value="$settings->contact_email" />
            </div>
            <div class="mb-2">
                <label for="">@lang('Phone')</label>
                <x-form.input name="phone" :value="$settings->phone"  />
            </div>
            <div class="mb-2">
                <label for="">@lang('Whatsapp Phone ')</label>
                <x-form.input name="whatsapp_phone" :value="$settings->whatsapp_phone" />
            </div>
        </div>
    </div>

    <div class="settings-content p-2  mb-3">
        <div class="settings-header">
            <p class="fs-3">@lang('Social Settings')</p>
        </div>
        <div class="settings-form theme p-4">
            <div class="mb-2">
                <label for="">@lang('Facebook Link')</label>
                <x-form.input name="facebook_link" :value="$settings->facebook_link" />
            </div>
            <div class="mb-2">
                <label for="">@lang('Linkedin Link')</label>
                <x-form.input name="linkedin_link" :value="$settings->linkedin_link" />
            </div>
            <div class="mb-2">
                <label for="">@lang('Twitter Link')</label>
                <x-form.input name="twitter_link" :value="$settings->twitter_link" />
            </div>
        </div>
    </div>
    <div class="settings-content p-2  mb-3">
        <div class="settings-header">
            <p class="fs-3">@lang('Color Settings')</p>
        </div>
        <div class="settings-form theme p-4">
            <div class="mb-2 w-25">
                <label for="">@lang('Main Color')</label>
                <x-form.input type="color" name="main_color" :value="$settings->main_color" />
            </div>
            <div class="mb-2 w-25">
                <label for="">@lang('Hover Color')</label>
                <x-form.input type="color" name="hover_color"  :value="$settings->hover_color"/>
            </div>
            <div class="mb-2">
                <label for="">@lang('Dark Mode')</label>
                <div class="form-check form-switch mb-2 w-25">
                    <input class="form-check-input" type="checkbox" name="dark_mode" value="1" {{ $settings->dark_mode == 1 ? "checked":""}}>
                </div>
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-lg w-100 m-2">@lang('Save')</button>

    </form>

</div>
@endsection
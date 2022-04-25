@extends('layouts.dashboard.app')
@section('content')
<form action="{{ route('dashboard.roles.update',$role->id) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">@lang('Name')</label>
        <input type="text" name="name" value="{{ $role->name }}" class="form-control">
    </div>
    @foreach(config('abilities') as $ability => $label)
    <div class="mb-3">
        <input type="checkbox" value="{{ $ability }}" name="abilities[]" class="form-check-input ms-2" id="{{ $ability }}"  @if(in_array($ability , $role->abilities)) checked @endif>
        <label class="form-check-label" for="{{ $ability }}">{{ $label }}</label>
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary">@lang('Add')</button>
</form>
@endsection
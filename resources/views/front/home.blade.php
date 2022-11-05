@extends('layouts.front.app')
@section('title')
@lang('Home')
@endsection
@section('content')

<div class="text-center">
    <h1>Store</h1>
    
    
    <div class="logout-front">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-dark">logout</button>
        </form>
    </div>
    <a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a>

   
</div>


@endsection
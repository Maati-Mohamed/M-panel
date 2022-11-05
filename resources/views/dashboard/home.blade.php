@extends('layouts.dashboard.app')
@section('content')

<div class="row text-center">
    <div class="col-md-3">
        <div class="users theme p-2 rounded-4 mb-2">
            <span><i class="bi bi-people fs-2"></i></span>
            <h5>@lang('Total Users')</h5>
            <span class="text-info">20</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="categories theme p-2 rounded-4 mb-2">
            <span><i class="bi bi-tag fs-2"></i></span>
            <h5>@lang('Total Categories')</h5>
            <span class="text-info">100</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="ads theme p-2 rounded-4 mb-2">
            <span><i class="bi bi-bar-chart-steps fs-2"></i></span>
            <h5>@lang('Total Orders')</h5>
            <span class="text-info">70</span>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="pages theme p-2 rounded-4">
            <span><i class="bi bi-file-earmark-break fs-2"></i></span>
            <h5>@lang('Total sales')</h5>
            <span class="text-info">40</span>
        </div>
    </div>

</div>

@endsection
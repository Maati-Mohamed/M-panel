@extends('layouts.dashboard.app')
@section('content')
<div class="boxes">
    <div class="box users">
        <div class="details">
            <p class="mb-2">@lang('Total Users')</p>
            <h1>12,543</h1>
        </div>
        <div class="icon">
            <i class="bi bi-people-fill"></i>
        </div>
    </div>
    <div class="box orders">
        <div class="details">
            <p class="mb-2">@lang('Total Orders')</p>
            <h1>12,543</h1>
        </div>
        <div class="icon">
            <i class="bi bi-cart3"></i>
        </div>
    </div>
    <div class="box categories">
        <div class="details">
            <p class="mb-2">@lang('Total Categories')</p>
            <h1>12,543</h1>
        </div>
        <div class="icon">
            <i class="bi bi-cloud-arrow-down"></i>
        </div>
    </div>
    <div class="box sales">
        <div class="details">
            <p class="mb-2">@lang('Total sales')</p>
            <h1>12,543</h1>
        </div>
        <div class="icon">
            <i class="bi bi-diagram-3"></i>
        </div>
    </div>
</div>
<div class="charts">
    <!-- Chart's container -->
    <div class="row">
        <p class="text-primary"><i class="bi bi-emoji-smile"></i> من سار على الدرب وصل ...</p>
       
        <div class="col-lg-9">
            <p class="text-sm text-center">Users Analysis</p>
            <div id="chart" style="height: 300px"></div>

        </div>
        <div class="col-lg-3">
            <p class="text-sm text-center">Admin Analysis</p>
            <div id="chart_two" style="height: 300px"></div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.dashboard.app')
@section('title')
@lang('Roles')
@endsection
@section('content')

<table class="table role-table">
    <thead>
        <tr>
            <th>@lang('Table')</th>
            <th>@lang('Create')</th>
            <th>@lang('Show')</th>
            <th>@lang('Edit')</th>
            <th>@lang('Delete')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        @php
        $sub_permissions = \App\Models\Permission::where('table',$permission->table)->get();
        @endphp
        <tr>
            <td>{{$permission->table}}</td>

            @if($sub_permissions->where('name',$permission->table.'-create')->first())
            <td style="width: 56px;">

                @if($role->hasPermission($permission->table.'-create'))
                <span><i class="bi bi-check-lg"></i></span></span>
                @endif


            </td>
            @else
            <td style="width: 56px;">
            </td>
            @endif
            @if($sub_permissions->where('name',$permission->table.'-read')->first())
            <td style="width: 56px;">
                @if($role->hasPermission($permission->table.'-read'))
                <span><i class="bi bi-check-lg"></i></span></span>
                @endif
            </td>
            @else
            <td style="width: 56px;">
            </td>
            @endif
            @if($sub_permissions->where('name',$permission->table.'-update')->first())
            <td style="width: 56px;">

                @if($role->hasPermission($permission->table.'-update'))
                <span><i class="bi bi-check-lg"></i></span></span>
                @endif
            </td>
            @else
            <td style="width: 56px;">
            </td>
            @endif
            @if($sub_permissions->where('name',$permission->table.'-delete')->first())
            <td style="width: 56px;">

                @if($role->hasPermission($permission->table.'-delete'))
                <span><i class="bi bi-check-lg"></i></span></span>
                @endif
            </td>
            @else
            <td style="width: 56px;">
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

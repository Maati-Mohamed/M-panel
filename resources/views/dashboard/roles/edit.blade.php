@extends('layouts.dashboard.app')
@section('title')
@lang('Roles')
@endsection
@section('content')

<div class="">
    <form class="theme p-3" action="{{ route('admin.roles.update',$role->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="old_pasword" class="form-label">@lang('Role Name')</label>
            <x-form.input name="name" value="{{ $role->name }}" />
        </div>
        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">@lang('Display Name')</label>
            <x-form.input name="display_name" value="{{ $role->display_name }}"/>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">@lang('Description')</label>
            <x-form.input name="description" value="{{ $role->description }}" />
        </div>

        <table class="table role-table">

            <thead class="">
                <tr>
                    <th>@lang('Table')</th>
                    <th>@lang('Create')</th>
                    <th>@lang('Show')</th>
                    <th>@lang('Edit')</th>
                    <th>@lang('Delete')</th>
                </tr>
            </thead>
            <tbody>
                @php
                $permissions = \App\Models\Permission::groupBy('table')->get();
                @endphp
                @foreach($permissions as $permission)
                @php
                $sub_permissions = \App\Models\Permission::where('table', $permission->table)->get();
                @endphp
                <tr>
                    <td>{{ $permission->table }}</td>
                    @if($sub_permissions->where('name', $permission->table.'-create')->first())
                    <td>
                    <div class="form-check form-switch">
                        <input
                            name="permissions[]" 
                            class="form-check-input"
                            type="checkbox" 
                            value="{{ $permission->table.'-create' }}" 
                            id="{{ $permission->table.'-create' }}" 
                            @if(isset($role) && $role->hasPermission($permission->table.'-create'))checked @endif >
                    </div>
                    </td>
                    @else
                    <td>

                    </td>
                    @endif
                    @if($sub_permissions->where('name', $permission->table.'-read')->first())
                    <td>
                    <div class="form-check form-switch">
                        <input
                            name="permissions[]" 
                            class="form-check-input"
                            type="checkbox" 
                            value="{{ $permission->table.'-read' }}" 
                            id="{{ $permission->table.'-read' }}" 
                            @if(isset($role) && $role->hasPermission($permission->table.'-read'))checked @endif >
                    </div>
                    </td>
                    @else
                    <td>
                        
                    </td>
                    @endif
                    @if($sub_permissions->where('name', $permission->table.'-update')->first())
                    <td>
                    <div class="form-check form-switch">
                        <input
                            name="permissions[]" 
                            class="form-check-input"
                            type="checkbox" 
                            value="{{ $permission->table.'-update' }}" 
                            id="{{ $permission->table.'-update' }}" 
                            @if(isset($role) && $role->hasPermission($permission->table.'-update'))checked @endif >
                    </div>
                    </td>
                    @else
                    <td>
                        
                    </td>
                    @endif
                    @if($sub_permissions->where('name', $permission->table.'-delete')->first())
                    <td>
                    <div class="form-check form-switch">
                        <input
                            name="permissions[]" 
                            type="checkbox"
                            class="form-check-input"
                            value="{{ $permission->table.'-delete' }}" 
                            id="{{ $permission->table.'-delete' }}" 
                            @if(isset($role) && $role->hasPermission($permission->table.'-delete'))checked @endif >
                    </div>
                    </td>
                    @else
                    <td>
                        
                    </td>
                    @endif
                    
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn MyBtn">@lang('Edit')</button>
    </form>

</div>
@endsection

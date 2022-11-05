@extends('layouts.dashboard.app')
@section('title')
@lang('Roles')
@endsection
@section('content')

<table class="table theme role-table">
  @permission('roles-create')
    <a href="{{ route('admin.roles.create') }}" class="btn MyBtn mb-2"><span><i class="bi bi-plus"></i> @lang('Add')</span></a>
  @endpermission
    <thead class="">
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $role->name }}</p>
                    </div>
                </div>
            </td>
            <td class="d-flex gap-2">
            @permission('roles-show')
                <a href="{{ route('admin.roles.show',$role->id) }}" class="btn btn-outline-success"><span><i class="bi bi-eye"></i></span></a>
                @endpermission
                @permission('roles-update')
                <a href="{{ route('admin.roles.edit',$role->id) }}" class="btn btn-outline-primary"><span><i class="bi bi-pencil-square"></i></span></a>
                @endpermission
                @permission('roles-delete')
                <button class="btn btn-outline-danger"
                data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-roleId="{{ $role->id }}"
                ><span><i class="bi bi-trash3"></i></span></button>
                @endpermission
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h2 class="text-center p-5">@lang('Are you sure to delete') ؟</h2>
        <form action="{{ url('admin/roles/destroy') }}" method="post">
            @csrf 
            @method('delete')
          <div class="mb-3">
            <input type="hidden" class="form-control" value="" name="id" id="id">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">@lang('Close')</button>
        <button type="submit" class="btn btn-danger">@lang('Delete')</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection
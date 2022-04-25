@extends('layouts.dashboard.app')
@section('content')
<table class="table table-striped table-hover">
    <a class="btn btn-primary my-2" href="{{ route('dashboard.roles.create') }}">
        <i class="bi bi-plus-lg"></i>
        @lang('Add')
    </a>
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('Name')</th>
            <th>@lang('Users')</th>
            <th>@lang('Control')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $index=>$role)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->users_count }}</td>
            <td>
                <a href="{{ route('dashboard.roles.edit',$role->id) }} " title="Edit">
                    <i class="bi bi-pencil-square bg-primary text-white p-1 rounded-1"></i>
                </a>

                <button href="" title="Delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-userId="{{ $role->id }}">
                    <i class="bi bi-trash3-fill bg-danger text-white p-1 rounded-1"></i>
                </button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h2 class="text-center p-5">@lang('Are you sure to delete') ؟</h2>
        <form action="{{ url('dashboard/users/destroy') }}" method="post">
            @csrf 
            @method('delete')
          <div class="mb-3">
            <input type="hidden" class="form-control" name="id" id="id">
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
{{ $roles->links() }}
@endsection


<!-- onclick="event.preventDefault();document.getElementById('delete').submit(); -->
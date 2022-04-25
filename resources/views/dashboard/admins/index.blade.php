@extends('layouts.dashboard.app')
@section('content')
<table class="table table-striped table-hover table-light">
    <a class="btn btn-primary my-2" href="{{ route('dashboard.admins.create') }}">
        <i class="bi bi-plus-lg"></i>
        @lang('Add')
    </a>
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('Name')</th>
            <th>@lang('email')</th>
            <th>@lang('Photo')</th>
            <th>@lang('Control')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $index=>$admin)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <img src="{{ $admin->image_path }}" alt="{{ $admin->name }}" class="img-thumbnail img-responsive">
            </td>
            <td>
                <!-- -->

                <a href="{{ route('dashboard.admins.edit',$admin->id) }} " title="Edit">
                    <i class="bi bi-pencil-square bg-primary text-white p-1 rounded-1"></i>
                </a>

                <button href="" title="Delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-userId="{{ $admin->id }}">
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
        <form action="{{ url('dashboard/admins/destroy') }}" method="post">
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
{{ $admins->links() }}
@endsection


<!-- onclick="event.preventDefault();document.getElementById('delete').submit(); -->
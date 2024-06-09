@php
    use Illuminate\Support\Facades\Auth;
@endphp
@extends('components.table')

@section('title')
    Dashboard|FurniCrafts
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        @if(Session::has('success'))
        <span class="alert alert-success p-2">{{ Session::get('success')}}</span>
        @endif
        @if(Session::has('fail'))
        <span class="alert alert-danger p-2">{{ Session::get('fail')}}</span>
        @endif
        <div class="card-header card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Table User</h4>
          <a href="/add/user" class="btn btn-success btn-md fw-bold float-end">Add New User</a>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Registration Date</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
               @if (count($all_users) > 0)
               @foreach ($all_users as $user)
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    @if($user->status == 1)
                        <span class="badge bg-success text-white">Active</span>
                    @else
                        <span class="badge bg-danger  text-white">Not Active</span>
                    @endif
                </td>
                {{-- <td>{{ $user->status }}</td> --}}
                <td>{{ $user->created_at }}</td>
                <td><a href="/edit/{{ $user->uuid }}" class="btn btn-info btn-sm">Edit</a></td>
                <td><a href="/delete/{{ $user->uuid }}" class="btn btn-danger btn-sm">Delete</a></td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="7">No User Found</td>
               </tr>
               @endif

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection


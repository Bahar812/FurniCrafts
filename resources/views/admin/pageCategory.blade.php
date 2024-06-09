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
          <h4 class="card-title">Table Category</h4>
          <a href="/add/category" class="btn btn-success btn-md fw-bold float-end">Add New Category</a>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Name</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
               @if (count($all_category) > 0)
               @foreach ($all_category as $item)
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Category_Name }}</td>
                <td><a href="/edit/category/{{ $item->id }}" class="btn btn-info btn-sm">Edit</a></td>
                <td><a href="/delete/category/{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a></td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="7">No Category Found</td>
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


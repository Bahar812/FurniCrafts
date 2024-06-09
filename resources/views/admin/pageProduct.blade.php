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
          <h4 class="card-title">Table Product</h4>
          <a href="/add/product" class="btn btn-success btn-md fw-bold float-end">Add New Product</a>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stok</th>
                <th>Image</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
               @if (count($all_product) > 0)
               @foreach ($all_product as $product)
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->Nama_Product}}</td>
                <td>Rp {{ number_format($product->Price, 2, ',', '.') }}</td>
                <td>{{ $product->Stock }}</td>
                <td>
                    @if (filter_var($product->Img_Detail_1, FILTER_VALIDATE_URL))
                        <img src="{{ $product->Img_Detail_1 }}" width="100px">
                    @else
                        <img src="{{ asset('storage/' . $product->Img_Detail_1) }}" width="100px">
                    @endif
                </td>
                <td><a href="/editProduct/{{ $product->ItemId }}" class="btn btn-info btn-sm">Edit</a></td>
                <td><a href="/deleteProduct/{{ $product->ItemId }}" class="btn btn-danger btn-sm">Delete</a></td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="7">No Product Found</td>
               </tr>
               @endif

            </table>
            {{ $all_product->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection


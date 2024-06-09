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
          <h4 class="card-title">Table Shipping</h4>
          {{-- <a href="/add/user" class="btn btn-success btn-md fw-bold float-end">Add New User</a> --}}

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Nomer Telp</th>
                <th>Alamat</th>
                <th>Status</th>
                <th colspan="2">Action</th>
              </thead>
              <tbody>
               @if (count($all_shipping) > 0)
               @foreach ($all_shipping as $shipping)
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{  $shipping->user->name ?? 'N/A'  }}</td>
                <td>{{ $shipping->user->email ?? 'N/A' }}</td>
                <td>{{ $shipping->nomor_telepon }}</td>
                <td>{{ $shipping->alamat }}</td>
                <td class="status">{{ $shipping->status }}</td>
                <td>
                    <button
                    class="btn btn-info btn-sm done-button"
                    data-uuid="{{ $shipping->uuid }}"
                    {{ $shipping->status == 'Berhasil dikirim' ? 'disabled' : '' }}>
                    Done
                </button>
                </td>
                {{-- <td><a href="/delete/shipping/{{ $shipping->uuid }}" class="btn btn-danger btn-sm">Delete</a></td> --}}
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="7">No Shipping Found</td>
               </tr>
               @endif

            </table>
            {{ $all_shipping->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

<!-- Tambahkan script untuk Bootstrap jika belum -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.done-button').click(function() {
            var button = $(this);
            var uuid = button.data('uuid');

            $.ajax({
                url: '{{ url("/update/shipping") }}/' + uuid,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        button.prop('disabled', true);
                        button.closest('tr').find('.status').text('Berhasil dikirim'); // Perbarui kolom status
                    } else {
                        alert('Gagal mengupdate status');
                    }
                }
            });
        });
    });
</script>
@endsection


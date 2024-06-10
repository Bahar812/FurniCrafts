@include('components.header')

<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success p-2">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
    @endif
    <div class="card">
        <div class="card-header card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Wishlist</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($wishlist) > 0)
                            @foreach ($wishlist as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->product ? $item->product->Nama_Product : 'Product not found' }}</td>
                                    <td>Rp {{ $item->product ? number_format($item->product->Price, 2, ',', '.') : '-' }}</td>
                                    <td>
                                        @if ($item->product && filter_var($item->product->Img_Detail_1, FILTER_VALIDATE_URL))
                                            <img src="{{ $item->product->Img_Detail_1 }}" width="100px">
                                        @elseif ($item->product)
                                            <img src="{{ asset('storage/' . $item->product->Img_Detail_1) }}" width="100px">
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('wishlist.destroy', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No Product Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $wishlist->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

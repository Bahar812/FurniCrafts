@include("components.header")

<div class="container">
    @isset($transactions)
    <h1>Daftar Transaksi</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Status Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                @foreach ($transaction->detailTransactions as $index => $detail)
                    <tr class="{{ $index % 2 == 0 ? 'bg-light' : 'bg-info' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->product->Nama_Product }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>Rp {{ number_format($detail->subTotal, 0, ',', '.') }}</td>
                        <td>{{ $transaction->shipping->status }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endisset
    @empty($transactions)
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Anda belum melakukan transaksi.</h5>
                        </div>
                    </div>
                @endempty
</div>

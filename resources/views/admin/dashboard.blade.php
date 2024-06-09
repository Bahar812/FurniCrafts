@php
    use Illuminate\Support\Facades\Auth;
@endphp
@extends('components.table')

@section('title')
    Dashboard|FurniCrafts
@endsection

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Produk</h5>
                    <p class="card-text">{{ $totalProduk }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <p class="card-text">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Bulan Ini</h5>
                    <p class="card-text">{{ $totalTransaksiBulanIni }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Ringkasan Penjualan
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Tipe Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ringkasanPenjualan as $index => $transaksi)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->waktu }}</td>
                        <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->statusPembayaran }}</td>
                        <td>{{ $transaksi->tipePembayaran }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection


@include('components.head')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    <h3 class="text-success">Pembayaran Berhasil</h3>
                    <p class="text-muted">Terimakasih telah melakukan pembayaran. Transaksi Anda berhasil diproses.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Kembali Ke Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan script untuk FontAwesome jika belum -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

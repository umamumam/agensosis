@extends('layouts1.app')

@section('contents')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Transaksi</h3>
                <p class="text-subtitle text-muted">
                    Silakan isi form untuk membuat transaksi baru.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Buat Transaksi Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="no_transaksi" class="form-label">No. Transaksi</label>
                        <input type="text" id="no_transaksi" class="form-control" placeholder="No. Transaksi" name="no_transaksi" required>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="date" id="tgl_transaksi" class="form-control" name="tgl_transaksi" required>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="total_bayar" class="form-label">Total Bayar</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="total_bayar" class="form-control" placeholder="Total Bayar" name="total_bayar" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="uang_pembeli" class="form-label">Uang Pembeli</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="uang_pembeli" class="form-control" placeholder="Uang Pembeli" name="uang_pembeli" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="kembalian" class="form-label">Kembalian</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="kembalian" class="form-control" placeholder="Kembalian" name="kembalian" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentDate = new Date();
        var formattedDate = currentDate.toISOString().slice(0, 10);
        document.getElementById("tgl_transaksi").value = formattedDate;

        // Generate a random transaction number
        var randomTransactionNumber = Math.floor(100000 + Math.random() * 900000);
        document.getElementById("no_transaksi").value = randomTransactionNumber;
    });
</script>

@endsection

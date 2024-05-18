@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Transaksi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('transaksi.create') }}" class="btn btn-info me-3 text-white fw-bold"><i class="bi bi-cart-plus text-white"></i> Tambah Transaksi</a>
            <a href="{{ route('detailtransaksi.create') }}" class="btn btn-warning text-white fw-bold"><i class="bi bi-cart-plus text-white"></i> Tambah Barang</a>
        </div>
        </div>
        <div class="card-body">
        <div class="d-flex justify-content-end" id="totalTransaksiContainer">
        <h3 class="fw-bold">Total Jumlah Transaksi: <span class="text-success">Rp 0</span></h3>
    </div>
            <div class="table-responsive">
                <h4>Daftar Transaksi</h4>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Bayar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalTransaksi = 0;
                        @endphp
                        @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->no_transaksi }}</td>
                            <td>{{ $transaksi->tgl_transaksi }}</td>
                            <td><span class="text-success">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</span></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                    </form>
                                    <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-success"><i class="bi bi-eye-fill"></i> Detail</a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $totalTransaksi += $transaksi->total_bayar;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <hr>
            <div class="d-flex justify-content-end">
                <h3 class="fw-bold">Total Jumlah Transaksi: <span class="text-success">Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</span></h3>
            </div>
<script>
    // Menghitung total transaksi dari tabel
    document.addEventListener("DOMContentLoaded", function() {
        let totalTransaksi = 0;
        let tabelTransaksi = document.getElementById("table1");
        let rows = tabelTransaksi.getElementsByTagName("tr");
        
        // Mulai dari 1 untuk melewati baris header
        for (let i = 1; i < rows.length; i++) {
            let row = rows[i];
            let cell = row.getElementsByTagName("td")[2]; // Kolom dengan total bayar

            if (cell) {
                let totalBayar = parseFloat(cell.innerText.replace("Rp", "").replace(".", "").trim());
                totalTransaksi += totalBayar;
            }
        }
        
        // Menampilkan total transaksi di bagian atas
        document.getElementById("totalTransaksiContainer").innerHTML = `
            <h3 class="fw-bold">Total Jumlah Transaksi: <span class="text-success">Rp ${totalTransaksi.toLocaleString()}</span></h3>
        `;
        
        // Menampilkan total transaksi di bagian bawah
        document.getElementById("totalTransaksi").innerText = `Rp ${totalTransaksi.toLocaleString()}`;
    });
</script>
            <hr>
            <br>
            <div class="table-responsive">
                <br>
                <h4 align="center">Detail Transaksi / Barang Yang Dibeli</h4>
                <hr>
                <br>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->no_transaksi }}</td>
                            <td>{{ $detail->barang->nama_barang }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('detailtransaksi.edit', $detail->id) }}" class="btn btn-primary me-2"><i class="bi bi-pencil-fill"></i> Edit</a>
                                    <form action="{{ route('detailtransaksi.destroy', $detail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

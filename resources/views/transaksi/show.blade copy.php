@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Transaksi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Daftar Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>No. Transaksi: {{ $transaksi->no_transaksi }}</h4>
        </div>
        <div class="card-body">
            <h4>Detail Transaksi:</h4>
            <table class="table" id="detailTransaksiTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->detailTransaksis as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->barang->nama_barang }}</td>
                        <td>Rp {{ number_format($detail->barang->harga, 0, ',', '.') }}</td>
                        <td>
                            {{ $detail->qty }}
                        </td>
                        <td>Rp <span class="subtotal">{{ number_format($detail->subtotal, 0, ',', '.') }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Harga:</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Tanggal Transaksi:</td>
                        <td>{{ $transaksi->tgl_transaksi }}</td>
                    </tr>
                    <tr>
                        <td>Total Bayar:</td>
                        <td><b id="totalBayar" class="text-success"></b></td>
                    </tr>
                    <tr>
                        <td>Uang Pembeli:</td>
                        <td>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" id="uangPembeli" class="form-control" placeholder="Uang Pembeli" name="uang_pembeli" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Kembalian:</td>
                        <td><b id="kembalian" class="text-success"></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Hitung subtotal dan perbarui tampilan setiap kali halaman dimuat
    document.addEventListener("DOMContentLoaded", function() {
        var detailTransaksiTable = document.getElementById('detailTransaksiTable');
        var rows = detailTransaksiTable.getElementsByTagName('tr');
        var totalBayar = 0;
        
        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var qtyCell = row.cells[3];
            var hargaCell = row.cells[2];
            var subtotalCell = row.cells[4];
            var qty = parseInt(qtyCell.textContent);
            var harga = parseInt(hargaCell.textContent.replace(/\D/g, ''));
            var subtotal = qty * harga;
            subtotalCell.innerHTML = 'Rp ' + formatNumber(subtotal);
            totalBayar += subtotal;
        }

        document.getElementById('totalBayar').innerText = 'Rp ' + formatNumber(totalBayar);
    });

    // Format angka menjadi format ribuan
    function formatNumber(number) {
        return new Intl.NumberFormat().format(number);
    }

    // Hitung kembalian saat uang pembeli diubah
    document.getElementById('uangPembeli').addEventListener('input', function() {
        var totalBayar = parseFloat(document.getElementById('totalBayar').innerText.replace(/\D/g, ''));
        var uangPembeli = parseFloat(this.value.replace(/\D/g, ''));
        var kembalian = uangPembeli - totalBayar;
        document.getElementById('kembalian').innerText = 'Rp ' + formatNumber(kembalian);
    });
</script>
@endsection

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
<!-- Bagian Card Content -->
<!-- Bagian Card Content -->
<div id="cardContent">
    <div class="container">
        <div class="card border-primary">
            <div class="card-header">
                <h4 align="center">Kuitansi Belanja Agen Sosis Lancar Manunggal</h4>
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
                            <td>{{ date('d F Y', strtotime($transaksi->tgl_transaksi)) }}</td>
                        </tr>
                        <tr>
                            <td>Total Bayar:</td>
                            <td><b id="totalBayar" class="text-success"></b></td>
                        </tr>
                        <tr>
                            <td>Uang Pembeli:</td>
                            <td>
                                <div class="input-group mb-3">
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
</div>

<!-- Tombol -->
<div class="row" align="center">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('detailtransaksi.create') }}'">
                    Tambah Transaksi
                </button>
                <button type="button" class="btn btn-success" onclick="printCardContent()">
                    <i class="bi bi-print"></i> Cetak Kuitansi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahDetailTransaksiModal" tabindex="-1" aria-labelledby="tambahDetailTransaksiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDetailTransaksiModalLabel">Tambah Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Isi formulir untuk menambah detail transaksi -->
                <form id="formTambahDetailTransaksi">
                    @csrf
                    <div class="form-group">
                        <label for="id_barang">Nama Barang</label>
                        <select class="form-control" id="id_barang" name="id_barang">
                            @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" data-harga="{{ $barang->harga }}" data-stok="{{ $barang->stok }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control" id="qty" name="qty">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="simpanDetailTransaksi">Simpan</button>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        #tambahDetailTransaksiLink, #cetakDataBtn {
            display: none !important;
        }
    }
</style>

<script>
    // Fungsi untuk mencetak card content
    function printCardContent() {
        var content = document.getElementById('cardContent').innerHTML;
        var printWindow = window.open('', '', 'height=842,width=595'); // Set ukuran setengah kertas A4
        printWindow.document.write('<html><head><title>Cetak Data</title></head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

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

    // Mengisi informasi barang yang dipilih ke dalam formulir modal
    document.getElementById('id_barang').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        document.getElementById('harga').value = selectedOption.getAttribute('data-harga');
        document.getElementById('stok').value = selectedOption.getAttribute('data-stok');
    });

    // Simpan detail transaksi
    document.getElementById('simpanDetailTransaksi').addEventListener('click', function() {
        var formData = new FormData(document.getElementById('formTambahDetailTransaksi'));

        // Kirim data detail transaksi ke server menggunakan AJAX
        fetch('{{ route('detailtransaksi.store') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Jika berhasil disimpan, perbarui tabel detail transaksi dan harga total
                if (data.success) {
                    // Perbarui tabel detail transaksi dan harga total di sini

                    // Tampilkan pesan sukses
                    alert(data.message);

                    // Reset formulir
                    document.getElementById('formTambahDetailTransaksi').reset();

                    // Tutup modal
                    var modal = new bootstrap.Modal(document.getElementById('tambahDetailTransaksiModal'));
                    modal.hide();
                } else {
                    // Jika terjadi kesalahan, tampilkan pesan error
                    alert('Gagal menyimpan detail transaksi');
                }
            })
            .catch(error => {
                // Tangani kesalahan jika terjadi
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan detail transaksi');
            });
    });

</script>

@endsection

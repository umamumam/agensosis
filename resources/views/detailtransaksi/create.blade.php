@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Detail Transaksi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Detail Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Detail Transaksi</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('detailtransaksi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="no_transaksi">No. Transaksi</label>
                    <input type="text" class="form-control" id="no_transaksi" name="no_transaksi">
                </div>
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
                    <input type="text" class="form-control" id="harga" name="harga" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" disabled readonly>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var idBarangSelect = document.getElementById('id_barang');
        var hargaInput = document.getElementById('harga');
        var stokInput = document.getElementById('stok');
        var qtyInput = document.getElementById('qty');

        idBarangSelect.addEventListener('change', function() {
            var selectedOption = idBarangSelect.options[idBarangSelect.selectedIndex];
            hargaInput.value = selectedOption.getAttribute('data-harga');
            stokInput.value = selectedOption.getAttribute('data-stok');
        });

        qtyInput.addEventListener('input', function() {
            var stok = parseInt(stokInput.value);
            var qty = parseInt(qtyInput.value);
            if (!isNaN(qty) && qty >= 0) {
                stokInput.value = stok - qty;
            }
        });
    });
</script>
@endsection

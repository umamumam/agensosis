@extends('layouts1.app')

@section('contents')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Detail Transaksi</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('detailtransaksi.update', $detail->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin memperbarui detail transaksi ini?')">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="no_transaksi">No. Transaksi</label>
                    <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" value="{{ $detail->no_transaksi }}" readonly>
                </div>
                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select class="form-control" id="id_barang" name="id_barang" disabled>
                        @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ $barang->id == $detail->id_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $detail->barang->harga }}" readonly>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="{{ $detail->barang->stok }}" readonly>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty" value="{{ $detail->qty }}">
                    <span id="qtyError" class="text-danger"></span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var qtyInput = document.getElementById('qty');
        var stokInput = document.getElementById('stok');
        var qtyError = document.getElementById('qtyError');

        qtyInput.addEventListener('input', function() {
            var stok = parseInt(stokInput.value);
            var qty = parseInt(qtyInput.value);
            if (!isNaN(qty) && qty >= 0) {
                if (qty > stok) {
                    qtyError.innerText = 'Qty tidak boleh melebihi stok yang tersedia';
                    qtyInput.value = stok; // Mengembalikan nilai input qty menjadi stok yang tersedia
                } else {
                    qtyError.innerText = '';
                }
            } else {
                qtyError.innerText = 'Qty harus berupa angka positif';
            }
        });
    });
</script>
@endsection

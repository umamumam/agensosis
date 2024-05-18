@extends('layouts1.app')

@section('contents')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Detail Transaksi</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('detailtransaksi.update', $detail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="no_transaksi">No. Transaksi</label>
                    <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" value="{{ $detail->no_transaksi }}">
                </div>
                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select class="form-control" id="id_barang" name="id_barang">
                        @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ $barang->id == $detail->id_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input type="text" class="form-control" id="qty" name="qty" value="{{ $detail->qty }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Barang</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/barang">Data Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="id_jenis">Jenis Barang</label>
                                    <select name="id_jenis" id="id_jenis" class="form-control">
                                        @foreach ($jenisBarangs as $jenisBarang)
                                            <option value="{{ $jenisBarang->id }}" {{ $barang->id_jenis == $jenisBarang->id ? 'selected' : '' }}>{{ $jenisBarang->nama_jenis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga (Rp)</label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ number_format($barang->harga, 0, ',', '.') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok (pcs)</label>
                                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang->stok }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

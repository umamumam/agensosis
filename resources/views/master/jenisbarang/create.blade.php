@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Jenis Barang</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('jenisbarang.index') }}">Data Jenis Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Jenis Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
    
        <div class="card" style="margin-top: 30px;">
            <div class="card-header">
                <h4 class="card-title">Tambah Jenis Barang</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jenisbarang.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_jenis">Nama Jenis</label>
                                <input type="text" id="nama_jenis" class="form-control" name="nama_jenis" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <a href="{{ route('jenisbarang.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>
@endsection

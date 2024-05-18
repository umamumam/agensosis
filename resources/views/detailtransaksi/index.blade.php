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
            <h2>Detail Transaksi</h2>
            <a href="{{ route('detailtransaksi.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Detail Transaksi</a>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $detail)
                    <tr>
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
@endsection

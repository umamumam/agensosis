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
            <a href="{{ route('transaksi.create') }}" class="btn btn-info me-3"><i class="bi bi-plus"></i> Tambah Transaksi</a>
            <a href="{{ route('detailtransaksi.create') }}" class="btn btn-warning"><i class="bi bi-plus"></i> Tambah Barang</a>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->no_transaksi }}</td>
                            <td>{{ $transaksi->tgl_transaksi }}</td>
                            
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

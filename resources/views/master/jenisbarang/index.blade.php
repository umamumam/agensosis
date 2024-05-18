@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tabel Jenis Barang</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Jenis Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
    
        <div class="card" style="margin-top: 30px;">
            <div class="card-header">
                <div class="d-flex justify-content-end mb-3"><a href="{{ route('jenisbarang.create') }}" class="btn btn-info"><i class="bi bi-plus"></i> Tambah Jenis Barang</a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Jenis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jenisBarang as $key => $jenis)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $jenis->nama_jenis }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('jenisbarang.edit', [$jenis->id]) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['jenisbarang.destroy', $jenis->id], 'class' => 'delete-form']) !!}
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                        {!! Form::close() !!}
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
</div>
@endsection

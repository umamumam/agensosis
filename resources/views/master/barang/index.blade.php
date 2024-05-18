@extends('layouts1.app')

@section('contents')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Barang</h3>
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
                <div class="d-flex justify-content-end mb-3"><a href="{{ route('barang.create') }}" class="btn btn-info"><i class="bi bi-plus"></i> Tambah Barang</a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $key => $barang)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->jenisBarang->nama_jenis }}</td>
                                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                                <td>{{ $barang->stok }} pcs</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['barang.destroy', $barang->id], 'class' => 'delete-form']) !!}
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                        {!! Form::close() !!}
                                        <button class="btn btn-success ambil-stok" data-id="{{ $barang->id }}"><i class="bi bi-cart-plus-fill"></i> Ambil Stok</button>
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

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mendengarkan klik tombol "Ambil Stok"
        document.querySelectorAll('.ambil-stok').forEach(function(button) {
            button.addEventListener('click', function() {
                var idBarang = button.getAttribute('data-id');
                // Mengirim permintaan AJAX untuk mengurangi stok
                axios.put('/ambil-stok/' + idBarang)
                    .then(function(response) {
                        // Mengambil data stok yang telah diupdate dari response
                        var stokBaru = response.data.stok;
                        // Menampilkan stok baru di baris tabel yang sesuai
                        var stokCell = button.closest('tr').querySelector('.stok-cell');
                        stokCell.textContent = stokBaru + ' pcs';
                    })
                    .catch(function(error) {
                        console.error('Terjadi kesalahan:', error);
                    });
            });
        });
    });
</script>
@endsection

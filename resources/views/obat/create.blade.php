@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Obat</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('obat.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_obat" class="form-label">Kode Obat</label>
                    <input type="text" class="form-control" name="kode_obat" placeholder="Masukkan kode obat" required>
                </div>
                <div class="mb-3">
                    <label for="nama_obat" class="form-label">Nama Obat</label>
                    <input type="text" class="form-control" name="nama_obat" placeholder="Masukkan nama obat" required>
                </div>
                <div class="mb-3">
                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                    <input type="number" class="form-control" name="harga_satuan" placeholder="Masukkan harga satuan" required>
                </div>
                <div class="mb-3">
                    <label for="no_batch" class="form-label">No Batch</label>
                    <input type="text" class="form-control" name="no_batch" placeholder="Masukkan nomor batch" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" placeholder="Masukkan jumlah stok" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Obat</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

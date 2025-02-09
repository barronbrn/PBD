@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ isset($transaksi) ? 'Edit Transaksi' : 'Tambah Transaksi' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Data Transaksi</a></li>
                <li class="breadcrumb-item active">{{ isset($transaksi) ? 'Edit Transaksi' : 'Tambah Transaksi' }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ isset($transaksi) ? 'Form Edit Transaksi' : 'Form Tambah Transaksi' }}</h5>
            
            <form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi->no_transaksi) : route('transaksi.store') }}" method="POST">
                @csrf
                @if(isset($transaksi))
                    @method('PUT')
                @endif
                
                <div class="row mb-3">
                    <label for="no_transaksi" class="col-sm-2 col-form-label">No Transaksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" value="{{ isset($transaksi) ? $transaksi->no_transaksi : old('no_transaksi') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="{{ isset($transaksi) ? $transaksi->kode_obat : old('kode_obat') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="qty" name="qty" value="{{ isset($transaksi) ? $transaksi->qty : old('qty') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="selisin" class="col-sm-2 col-form-label">Selisin</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="qty" name="qty" value="{{ isset($transaksi) ? $transaksi->qty : old('qty') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nilai_buku" class="col-sm-2 col-form-label">Nilai Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_buku" name="nilai_buku" value="{{ isset($transaksi) ? $transaksi->nilai_buku : old('nilai_buku') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nilai_fisik" class="col-sm-2 col-form-label">Nilai Fisik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nilai_fisik" name="nilai_fisik" value="{{ isset($transaksi) ? $transaksi->nilai_fisik : old('nilai_fisik') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="selisih_nilai" class="col-sm-2 col-form-label">Selisih Nilai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="selisih_nilai" name="selisih_nilai" value="{{ isset($transaksi) ? $transaksi->selisih_nilai : old('selisih_nilai') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-success">{{ isset($transaksi) ? 'Update' : 'Simpan' }}</button>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

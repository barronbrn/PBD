@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Data Transaksi</a></li>
            <li class="breadcrumb-item active">Edit Transaksi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Edit Transaksi</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaksi.update', ['noTransaksi' => $transaksi->no_transaksi, 'kodeObat' => $transaksi->kode_obat]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="no_transaksi" class="form-label">No Transaksi</label>
                <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" 
                    value="{{ old('no_transaksi', $transaksi->no_transaksi) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="kode_obat" class="form-label">Kode Obat</label>
                <select class="form-control" id="kode_obat" name="kode_obat" required>
                    <option value="">Pilih Kode Obat</option>
                    @foreach($obat as $o)
                        <option value="{{ $o->kode }}" {{ old('kode_obat', $transaksi->kode_obat) == $o->kode ? 'selected' : '' }}>
                            {{ $o->kode }} - {{ $o->nama_obat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" 
                    value="{{ old('qty', $transaksi->qty) }}" required>
            </div>

            <div class="mb-3">
                <label for="selisih" class="form-label">Selisih</label>
                <input type="number" class="form-control" id="selisih" name="selisih" 
                    value="{{ old('selisih', $transaksi->selisih) }}" required>
            </div>

            <div class="mb-3">
                <label for="nilai_buku" class="form-label">Nilai Buku</label>
                <input type="number" class="form-control" id="nilai_buku" name="nilai_buku" 
                    value="{{ old('nilai_buku', $transaksi->nilai_buku) }}" required>
            </div>

            <div class="mb-3">
                <label for="nilai_fisik" class="form-label">Nilai Fisik</label>
                <input type="number" class="form-control" id="nilai_fisik" name="nilai_fisik" 
                    value="{{ old('nilai_fisik', $transaksi->nilai_fisik) }}" required>
            </div>

            <div class="mb-3">
                <label for="selisih_nilai" class="form-label">Selisih Nilai</label>
                <input type="number" class="form-control" id="selisih_nilai" name="selisih_nilai" 
                    value="{{ old('selisih_nilai', $transaksi->selisih_nilai) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
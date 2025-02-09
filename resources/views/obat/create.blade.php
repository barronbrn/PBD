@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ isset($obat) ? 'Edit Obat' : 'Tambah Obat' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('obat.index') }}">Data Obat</a></li>
                <li class="breadcrumb-item active">{{ isset($obat) ? 'Edit Obat' : 'Tambah Obat' }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ isset($obat) ? 'Form Edit Obat' : 'Form Tambah Obat' }}</h5>
            
            <form action="{{ isset($obat) ? route('obat.update', $obat->kode) : route('obat.store') }}" method="POST">
                @csrf
                @if(isset($obat))
                    @method('PUT')
                @endif
                
                <div class="row mb-3">
                    <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" value="{{ isset($obat) ? $obat->kode : old('kode') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ isset($obat) ? $obat->nama_obat : old('nama_obat') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jenis_obat" class="col-sm-2 col-form-label">Jenis Obat</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jenis_obat" name="jenis_obat" required>
                            <option value="">Pilih Jenis Obat</option>
                            @foreach ($jenisObat as $jenis)
                                <option value="{{ $jenis->id }}" {{ isset($obat) && $obat->jenis_obat == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->satuan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="harga_pokok" class="col-sm-2 col-form-label">Harga Pokok</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_pokok" name="harga_pokok" value="{{ isset($obat) ? $obat->harga_pokok : old('harga_pokok') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ isset($obat) ? $obat->stock : old('stock') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-success">{{ isset($obat) ? 'Update' : 'Simpan' }}</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

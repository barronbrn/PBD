@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Data Obat</h1>
    <a href="{{ route('obat.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Obat</h5>
                    <form action="{{ route('obat.update', $obat->kode) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" 
                                value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenisObat" class="form-label">Jenis Obat</label>
                            <select class="form-control" id="jenisObat" name="jenisObat" required>
                                <option value="">Pilih Jenis Obat</option>
                                @foreach($jenisObat as $jenis)
                                    <option value="{{ $jenis->id }}" 
                                        {{ old('jenis_obat', $obat->jenis_obat) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" 
                                value="{{ old('harga', $obat->harga_pokok) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stock" name="stock" 
                                value="{{ old('stock', $obat->stock) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



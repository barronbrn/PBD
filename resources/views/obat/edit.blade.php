{{-- @extends('layouts.main')

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

 --}}


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

                    <!-- Tampilkan pesan error validasi -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('obat.update', $obat->kode) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Input Kode Obat (Readonly) -->
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Obat</label>
                            <input type="text" class="form-control" id="kode" name="kode" 
                                value="{{ old('kode', $obat->kode) }}" readonly>
                        </div>

                        <!-- Input Nama Obat -->
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" 
                                value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                        </div>

                        <!-- Input Jenis Obat -->
                        <div class="mb-3">
                            <label for="id_jenis_obat" class="form-label">Jenis Obat</label>
                            <select class="form-control" id="id_jenis_obat" name="id_jenis_obat" required>
                                <option value="">Pilih Jenis Obat</option>
                                @foreach($jenisObat as $jenis)
                                    <option value="{{ $jenis->id }}" 
                                        {{ old('id_jenis_obat', $obat->id_jenis_obat) == $jenis->id ? 'selected' : '' }}>
                                        {{ $jenis->satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Input Harga Pokok -->
                        <div class="mb-3">
                            <label for="harga_pokok" class="form-label">Harga Pokok</label>
                            <input type="number" class="form-control" id="harga_pokok" name="harga_pokok" 
                                value="{{ old('harga_pokok', $obat->harga_pokok) }}" required>
                        </div>

                        <!-- Input Stok -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stock" name="stock" 
                                value="{{ old('stock', $obat->stock) }}" required>
                        </div>

                        <!-- Tombol Simpan dan Batal -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
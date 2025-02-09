{{-- @extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Data Obat</h1>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit transaksi</h5>
                    <form action="{{ route('transaksi.update', $transaksi->kode) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="no_transaksi" class="form-label">No transaksi</label>
                            <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" 
                                value="{{ old('no_transaksi', $transaksi->no_transaksi) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kode_obat" class="form-label">Kode Obat</label>
                            <input type="text" class="form-control" id="kode_obat" name="kode_obat" 
                                value="{{ old('kode_obat', $transaksi->kode_obat) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty" 
                                value="{{ old('qty', $transaksi->qty) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="selisin" class="form-label">selisih</label>
                            <input type="text" class="form-control" id="selisin" name="selisin" 
                                value="{{ old('selisin', $transaksi->selisin) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nilai_buku" class="form-label">Nilai Buku</label>
                            <input type="text" class="form-control" id="nilai_buku" name="nilai_buku" 
                                value="{{ old('nilai_buku', $transaksi->nilai_buku) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nilai_fisik" class="form-label">Nilai Fisik</label>
                            <input type="text" class="form-control" id="nilai_fisik" name="nilai_fisik" 
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
                    <h5 class="card-title">Form Edit Transaksi</h5>

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

                    <form action="{{ route('transaksi.update', $transaksi->kode) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Input Kode transaksi (Readonly) -->
                        <div class="mb-3">
                            <label for="no_transaksi" class="form-label">no_transaksi Obat</label>
                            <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" 
                                value="{{ old('no_transaksi', $transaksi->no_transaksi) }}" readonly>
                        </div>

                        <!-- Input Nama Obat -->
                        <div class="mb-3">
                            <label for="kode_obat" class="form-label">Kode Obat</label>
                            <input type="text" class="form-control" id="kode_obat" name="kode_obat" 
                                value="{{ old('kode_obat', $transaksi->kode_obat) }}" required>
                        </div>

                        <!-- Input Jenis Obat -->
                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty" 
                                value="{{ old('qty', $transaksi->qty) }}" required>
                        </div>

                        <!-- Input Harga Pokok -->
                        <div class="mb-3">
                            <label for="selisin" class="form-label">Selisih</label>
                            <input type="text" class="form-control" id="selisin" name="selisin" 
                                value="{{ old('selisin', $transaksi->selisin) }}" required>
                        </div>

                        <!-- Input Stok -->
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stock" name="stock" 
                                value="{{ old('stock', $transaksi->stock) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nilai_buku" class="form-label">Nilai Buku</label>
                            <input type="text" class="form-control" id="nilai_buku" name="nilai_buku" 
                                value="{{ old('nilai_buku', $transaksi->nilai_buku) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nilai_fisik" class="form-label">Nilai Fisik</label>
                            <input type="text" class="form-control" id="nilai_fisik" name="nilai_fisik" 
                                value="{{ old('nilai_fisik', $transaksi->nilai_fisik) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="selisih_nilai" class="form-label">Selisih Nilai</label>
                            <input type="text" class="form-control" id="selisih_nilai" name="selisih_nilai" 
                                value="{{ old('selisih_nilai', $transaksi->selisih_nilai) }}" required>
                        </div>

                        <!-- Tombol Simpan dan Batal -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
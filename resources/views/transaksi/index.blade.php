@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('transaksi.index') }}">Data Transaksi</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
            </h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered datatable">
                <thead class="table-dark">
                    <tr>
                        <th>No Transaksi</th>
                        <th>Kode Obat</th>
                        <th>Qty</th>
                        <th>Selisih</th>
                        <th>Nilai Buku</th>
                        <th>Nilai Fisik</th>
                        <th>Selisih Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $o)
                        <tr>
                            <td>{{ $o->no_transaksi }}</td>
                            <td>{{ $o->kode_obat }}</td> <!-- Menampilkan kode_obat -->
                            <td>{{ $o->qty }}</td>
                            <td>Rp. {{ number_format($o->selisih, 0, ', ', '.') }}</td>
                            <td>Rp. {{ number_format($o->nilai_buku, 0, ', ', '.') }}</td>
                            <td>Rp. {{ number_format($o->nilai_fisik, 0, ', ', '.') }}</td>
                            <td>Rp. {{ number_format($o->selisih_nilai, 0, ', ', '.') }}</td>
                            <td>
    <!-- Tombol Edit -->
    <a href="{{ route('transaksi.edit', ['noTransaksi' => $o->no_transaksi, 'kodeObat' => $o->kode_obat]) }}"
        class="btn btn-warning btn-sm">Edit</a>

    <!-- Tombol Hapus -->
    <form action="{{ route('transaksi.destroy', ['noTransaksi' => $o->no_transaksi, 'kodeObat' => $o->kode_obat]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
</form>
</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

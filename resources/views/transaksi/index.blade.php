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
                        <th>Selisin</th>
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
                            <!-- <td>Rp{{ number_format($o->harga_pokok, 0, ',', '.') }}</td> -->
                            <td>{{ $o->selisin }}</td>
                            <td>{{ $o->nilai_buku }}</td>
                            <td>{{ $o->nilai_fisik }}</td>
                            <td>{{ $o->selisih_nilai }}</td>
                            <td>
                                <a href="{{ route('transaksi.edit', $o->no_transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('transaksi.destroy', $o->no_transaksi) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
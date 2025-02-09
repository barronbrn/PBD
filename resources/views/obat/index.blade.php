@extends('layouts.main')

@section('content')
    <div class="pagetitle">
      <h1>Data Obat</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Data Obat</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
            </h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered datatable">
                <thead class="table-dark">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Harga Pokok</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obat as $o)
                        <tr>
                            <td>{{ $o->kode }}</td>
                            <td>{{ $o->nama_obat }}</td>
                            <td>{{ $o->jenisObat->satuan }}</td> <!-- Menampilkan satuan dari relasi jenisObat -->
                            <td>Rp{{ number_format($o->harga_pokok, 0, ',', '.') }}</td>
                            <td>{{ $o->stock }}</td>
                            <td>
                                <a href="{{ route('obat.edit', $o->kode) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('obat.destroy', $o->kode) }}" method="POST" style="display:inline-block;">
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
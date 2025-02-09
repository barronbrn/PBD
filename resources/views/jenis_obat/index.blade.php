@extends('layouts.main')

@section('content')
    <div class="pagetitle">
      <h1>Data Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('jenis-obat.index') }}">Data Jenis Obat</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('jenis_obat.create') }}" class="btn btn-primary">Tambah Jenis Obat</a>
            </h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered datatable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Jenis Obat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisObat as $o)
                        <tr>
                            <td>{{ $o->no }}</td>
                             <td>{{ $o->satuan }}</td> <!-- Menampilkan jenis obat -->
                            <td>
                                <a href="{{ route('jenis_obat.edit', $o->satuan) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jenis_obat.destroy', $o->satuan) }}" method="POST" style="display:inline-block;">
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
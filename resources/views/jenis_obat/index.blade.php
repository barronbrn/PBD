@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Data Jenis Obat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Jenis Obat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('jenis-obat.create') }}" class="btn btn-primary">Tambah Jenis Obat</a>
        </h5>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered datatable">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisObat as $jenis)
                    <tr>
                        <td>{{ $jenis->id }}</td>
                        <td>{{ $jenis->satuan }}</td>
                        <td>
                            <a href="{{ route('jenis-obat.edit', $jenis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jenis-obat.destroy', $jenis->id) }}" method="POST" style="display:inline-block;">
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
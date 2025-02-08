@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Daftar Pelanggan</h2>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama_pelanggan }}</td>
                        <td>{{ $p->alamat_pelanggan }}</td>
                        <td>
                            <a href="{{ route('obat.edit', $p->kode_obat) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('obat.destroy', $p->kode_obat) }}" method="POST" style="display:inline;">
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
@endsection

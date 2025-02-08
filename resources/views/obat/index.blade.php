@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Obat</h2>
    <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Harga Satuan</th>
                <th>No Batch</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $o)
            <tr>
                <td>{{ $o->kode_obat }}</td>
                <td>{{ $o->nama_obat }}</td>
                <td>Rp{{ number_format($o->harga_satuan, 2) }}</td>
                <td>{{ $o->no_batch }}</td>
                <td>{{ $o->stok }}</td>
                <td>
                    <a href="{{ route('obat.edit', $o->kode_obat) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('obat.destroy', $o->kode_obat) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Tambah Jenis Obat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jenis-obat.index') }}">Data Jenis Obat</a></li>
            <li class="breadcrumb-item active">Tambah Jenis Obat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Tambah Jenis Obat</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jenis-obat.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" 
                    value="{{ old('satuan') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jenis-obat.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
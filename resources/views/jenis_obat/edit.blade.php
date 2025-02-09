@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Jenis Obat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jenis-obat.index') }}">Data Jenis Obat</a></li>
            <li class="breadcrumb-item active">Edit Jenis Obat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Edit Jenis Obat</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jenis-obat.update', $jenisObat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" 
                    value="{{ old('satuan', $jenisObat->satuan) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jenis-obat.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
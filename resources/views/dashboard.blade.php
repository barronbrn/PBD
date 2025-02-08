@extends('layouts.main')

@section('title', 'Dashboard Apotek')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

        <!-- Statistik -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Obat</h5>
                    <h3>{{ $totalObat }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Jenis Obat</h5>
                    <h3>{{ $totalJenisObat }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <h3>{{ $totalTransaksi }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Stok Obat</h5>
                    <h3>{{ $totalStokObat }}</h3>
                </div>
            </div>
        </div>

        <!-- Tabel Transaksi Terbaru -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Terbaru</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Kode Obat</th>
                                <th>Qty</th>
                                <th>Nilai Buku</th>
                                <th>Nilai Fisik</th>
                                <th>Selisih Nilai</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksiTerbaru as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->no_transaksi }}</td>
                                    <td>{{ $transaksi->kode_obat }}</td>
                                    <td>{{ $transaksi->qty }}</td>
                                    <td>Rp {{ number_format($transaksi->nilai_buku, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($transaksi->nilai_fisik, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($transaksi->selisih_nilai, 0, ',', '.') }}</td>
                                    <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
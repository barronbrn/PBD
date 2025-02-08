@extends('layouts.main')

@section('title', 'Dashboard Apotek')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
</div>

<section class="section dashboard">
    <div class="row">

        <!-- Statistik -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Faktur</h5>
                    <h3>{{ $totalFaktur }}</h3>
                </div>
            </div>
        </div>

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
                    <h5 class="card-title">Total Pelanggan</h5>
                    <h3>{{ $totalPelanggan }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pembayaran</h5>
                    <h3>{{ $totalPembayaran }}</h3>
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
                                <th>No Faktur</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksiTerbaru as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->no_faktur }}</td>
                                    <td>{{ $transaksi->pelanggan->nama_pelanggan }}</td>
                                    <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                                    <td>{{ $transaksi->tanggal_faktur }}</td>
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

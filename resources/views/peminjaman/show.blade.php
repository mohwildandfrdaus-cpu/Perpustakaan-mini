@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<h2>Detail Peminjaman</h2>
<div class="card">
    <div class="card-body">
        <p><strong>Buku:</strong> {{ $peminjaman->buku->judul }}</p>
        <p><strong>Anggota:</strong> {{ $peminjaman->anggota->nama }}</p>
        <p><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}</p>
        <p><strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_kembali ?? '-' }}</p>
        <p><strong>Status:</strong> <span class="badge bg-{{ $peminjaman->status == 'dipinjam' ? 'warning' : 'success' }}">{{ ucfirst($peminjaman->status) }}</span></p>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
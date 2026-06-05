@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
<h2>Detail Anggota</h2>
<div class="card">
    <div class="card-body">
        <h4>{{ $anggota->nama }}</h4>
        <p><strong>Email:</strong> {{ $anggota->email }}</p>
        <p><strong>No. Telp:</strong> {{ $anggota->no_telp ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $anggota->alamat ?? '-' }}</p>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
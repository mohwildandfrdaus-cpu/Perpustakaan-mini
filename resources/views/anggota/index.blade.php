@extends('layouts.app')

@section('title', 'Daftar Anggota - Mini Library')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"><i class="bi bi-people text-success"></i> Daftar Anggota</h2>
            <p class="text-muted mb-0">Kelola data anggota perpustakaan</p>
        </div>
        <a href="{{ route('anggota.create') }}" class="btn btn-success-modern btn-modern">
            <i class="bi bi-plus-lg me-2"></i> Tambah Anggota
        </a>
    </div>

    <div class="table-container">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">No</th>
                    <th style="width: 25%;">Nama</th>
                    <th style="width: 30%;">Email</th>
                    <th class="text-center" style="width: 120px;">Telepon</th>
                    <th class="text-center" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggotas as $index => $anggota)
                <tr>
                    <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                    <td class="fw-semibold">{{ $anggota->nama }}</td>
                    <td>{{ $anggota->email }}</td>
                    <td class="text-center">{{ $anggota->telepon ?? '-' }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>Belum ada data anggota
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
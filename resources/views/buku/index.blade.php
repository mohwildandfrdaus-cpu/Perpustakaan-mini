@extends('layouts.app')

@section('title', 'Daftar Buku - Mini Library')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-journal-bookmark text-success"></i> Daftar Buku
            </h2>
            <p class="text-muted mb-0">Kelola koleksi buku perpustakaan Anda</p>
        </div>
        <a href="{{ route('buku.create') }}" class="btn btn-success-modern btn-modern">
            <i class="bi bi-plus-lg me-2"></i> Tambah Buku
        </a>
    </div>

    <div class="table-container">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">No</th>
                    <th style="width: 25%;">Judul</th>
                    <th style="width: 20%;">Penulis</th>
                    <th style="width: 22%;">Penerbit</th>
                    <th class="text-center" style="width: 80px;">Tahun</th>
                    <th class="text-center" style="width: 90px;">Stok</th>
                    <th class="text-center" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bukus as $index => $buku)
                <tr>
                    <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
                    <td class="fw-semibold">{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td class="text-center">{{ $buku->tahun }}</td>
                    <td class="text-center">
                        @if($buku->stok > 0)
                            <span class="badge-stok badge-stok-ada">
                                <i class="bi bi-check-circle me-1"></i>{{ $buku->stok }}
                            </span>
                        @else
                            <span class="badge-stok badge-stok-habis">
                                <i class="bi bi-x-circle me-1"></i>Habis
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
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
                    <td colspan="7" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        Belum ada data buku
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
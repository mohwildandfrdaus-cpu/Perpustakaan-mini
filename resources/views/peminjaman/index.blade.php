@extends('layouts.app')

@section('title', 'Data Peminjaman - Mini Library')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1"><i class="bi bi-arrow-left-right text-success"></i> Data Peminjaman</h2>
            <p class="text-muted mb-0">Kelola peminjaman buku</p>
        </div>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-success-modern btn-modern">
            <i class="bi bi-plus-lg me-2"></i> Tambah Peminjaman
        </a>
    </div>

    <div class="table-container">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Buku</th>
                    <th>Peminjam</th>
                    <th style="width: 120px;">Tgl Pinjam</th>
                    <th style="width: 130px;">Status</th>
                    <th style="width: 200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $index => $pinjam)
                <tr>
                    <td class="fw-bold text-muted">{{ $index + 1 }}</td>
                    <td class="fw-semibold">{{ $pinjam->buku->judul }}</td>
                    <td>{{ $pinjam->anggota->nama }}</td>
                    <td>{{ $pinjam->tanggal_pinjam->format('d M Y') }}</td>
                    <td>
                        @if($pinjam->status == 'dipinjam')
                            <span class="badge bg-warning text-dark rounded-pill px-3"><i class="bi bi-clock me-1"></i>Dipinjam</span>
                        @else
                            <span class="badge bg-success rounded-pill px-3"><i class="bi bi-check-circle me-1"></i>Dikembalikan</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
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
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>Belum ada data peminjaman
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
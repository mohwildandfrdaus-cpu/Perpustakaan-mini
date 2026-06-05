@extends('layouts.app')

@section('title', 'Edit Buku - Mini Library')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card-modern">
                <div class="card-header-modern">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-pencil-square fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-0">Edit Buku</h4>
                            <small class="opacity-75">Perbarui informasi buku</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <!-- PENTING: action ke route update, method POST + PUT -->
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- JUDUL -->
                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-bookmark me-1 text-success"></i> Judul Buku</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-book"></i></span>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                       value="{{ old('judul', $buku->judul) }}" placeholder="Masukkan judul buku..." required>
                            </div>
                            @error('judul')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <!-- PENULIS -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label"><i class="bi bi-person me-1 text-success"></i> Penulis</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" 
                                           value="{{ old('penulis', $buku->penulis) }}" placeholder="Nama penulis..." required>
                                </div>
                                @error('penulis')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <!-- PENERBIT -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label"><i class="bi bi-building me-1 text-success"></i> Penerbit</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                    <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" 
                                           value="{{ old('penerbit', $buku->penerbit) }}" placeholder="Nama penerbit..." required>
                                </div>
                                @error('penerbit')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <!-- TAHUN -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label"><i class="bi bi-calendar me-1 text-success"></i> Tahun Terbit</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" 
                                           value="{{ old('tahun', $buku->tahun) }}" placeholder="Contoh: 2024" 
                                           min="1900" max="{{ date('Y') }}" required>
                                </div>
                                @error('tahun')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <!-- STOK -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label"><i class="bi bi-box-seam me-1 text-success"></i> Stok</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-stack"></i></span>
                                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" 
                                           value="{{ old('stok', $buku->stok) }}" placeholder="Jumlah stok..." min="0" required>
                                </div>
                                @error('stok')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <hr class="my-4" style="opacity: 0.1;">

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary-modern btn-modern">
                                <i class="bi bi-x-lg me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-success-modern btn-modern">
                                <i class="bi bi-check-lg me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Info Update -->
            <div class="card-modern mt-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center text-muted">
                        <i class="bi bi-info-circle-fill me-3 fs-4 text-success"></i>
                        <div>
                            <small><strong>ID Buku:</strong> #{{ $buku->id }}</small><br>
                            <small><strong>Terakhir diperbarui:</strong> {{ $buku->updated_at ? $buku->updated_at->format('d M Y H:i') : 'Belum pernah' }}</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
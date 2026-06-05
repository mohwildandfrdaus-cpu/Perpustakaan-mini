@extends('layouts.app')

@section('title', 'Tambah Buku - Mini Library')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card-modern">
                <div class="card-header-modern">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-plus-circle fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-0">Tambah Buku</h4>
                            <small class="opacity-75">Masukkan data buku baru</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <!-- FORM HARUS BENAR: method POST, route store -->
                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Judul -->
                            <div class="col-md-12 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-bookmark me-1 text-success"></i> Judul Buku
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-book"></i></span>
                                    <input type="text" 
                                           name="judul" 
                                           class="form-control @error('judul') is-invalid @enderror" 
                                           value="{{ old('judul') }}"
                                           placeholder="Masukkan judul buku..."
                                           required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Penulis -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person me-1 text-success"></i> Penulis
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" 
                                           name="penulis" 
                                           class="form-control @error('penulis') is-invalid @enderror" 
                                           value="{{ old('penulis') }}"
                                           placeholder="Nama penulis..."
                                           required>
                                    @error('penulis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Penerbit -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-building me-1 text-success"></i> Penerbit
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-building"></i></span>
                                    <input type="text" 
                                           name="penerbit" 
                                           class="form-control @error('penerbit') is-invalid @enderror" 
                                           value="{{ old('penerbit') }}"
                                           placeholder="Nama penerbit..."
                                           required>
                                    @error('penerbit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tahun -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-calendar me-1 text-success"></i> Tahun Terbit
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                    <input type="number" 
                                           name="tahun" 
                                           class="form-control @error('tahun') is-invalid @enderror" 
                                           value="{{ old('tahun') }}"
                                           placeholder="Contoh: 2024"
                                           min="1900" 
                                           max="{{ date('Y') }}"
                                           required>
                                    @error('tahun')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-box-seam me-1 text-success"></i> Stok
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-stack"></i></span>
                                    <input type="number" 
                                           name="stok" 
                                           class="form-control @error('stok') is-invalid @enderror" 
                                           value="{{ old('stok') }}"
                                           placeholder="Jumlah stok..."
                                           min="0"
                                           required>
                                    @error('stok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4" style="opacity: 0.1;">

                        <!-- TOMBOL SUBMIT HARUS DI DALAM FORM -->
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary-modern btn-modern">
                                <i class="bi bi-x-lg me-2"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success-modern btn-modern">
                                <i class="bi bi-check-lg me-2"></i> Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
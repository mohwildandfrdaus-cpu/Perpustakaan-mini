@extends('layouts.app')

@section('title', 'Edit Anggota - Mini Library')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card-modern">
                <div class="card-header-modern">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-pencil-square fs-4 me-3"></i>
                        <div>
                            <h4 class="mb-0">Edit Anggota</h4>
                            <small class="opacity-75">Perbarui data anggota</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">

                    <form action="{{ url('/anggota/' . $anggota->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-person me-1 text-success"></i> Nama</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                       value="{{ old('nama', $anggota->nama) }}" placeholder="Nama lengkap..." required>
                            </div>
                            @error('nama')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-envelope me-1 text-success"></i> Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email', $anggota->email) }}" placeholder="email@contoh.com" required>
                            </div>
                            @error('email')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-telephone me-1 text-success"></i> No. Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                       value="{{ old('telepon', $anggota->telepon) }}" placeholder="0812xxxx...">
                            </div>
                            @error('telepon')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-geo-alt me-1 text-success"></i> Alamat</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                          placeholder="Alamat lengkap..." rows="3">{{ old('alamat', $anggota->alamat) }}</textarea>
                            </div>
                            @error('alamat')<<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <hr class="my-4" style="opacity: 0.1;">

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('anggota.index') }}" class="btn btn-secondary-modern btn-modern">
                                <i class="bi bi-x-lg me-2"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success-modern btn-modern">
                                <i class="bi bi-check-lg me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
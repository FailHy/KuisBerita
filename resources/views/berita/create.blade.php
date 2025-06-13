@extends('layouts.app')

@section('title', 'BUAT BERITA BARU')

@section('content')
<div class="card mb-5">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">BUAT BERITA BARU</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="judul" class="form-label fw-bold">JUDUL BERITA*</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                       id="judul" name="judul" value="{{ old('judul') }}" required
                       style="border: 2px solid black; padding: 0.75rem;">
                @error('judul')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="isi" class="form-label fw-bold">ISI BERITA*</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" 
                          id="isi" name="isi" rows="8" required
                          style="border: 2px solid black; padding: 0.75rem;">{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="penulis" class="form-label fw-bold">PENULIS*</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                       id="penulis" name="penulis" value="{{ old('penulis', Auth::user()->name) }}" required
                       style="border: 2px solid black; padding: 0.75rem;">
                @error('penulis')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="gambar" class="form-label fw-bold">GAMBAR</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                       id="gambar" name="gambar"
                       style="border: 2px solid black; padding: 0.75rem;">
                @error('gambar')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="bi bi-save me-2"></i> SIMPAN BERITA
                </button>
                <a href="{{ route('berita.index') }}" class="btn btn-outline-dark px-4 py-2 fw-bold">
                    <i class="bi bi-x-circle me-2"></i> BATAL
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .card {
        border: 3px solid black;
        box-shadow: 6px 6px 0px 0px black;
    }
    
    .card-header {
        border-bottom: 3px solid black !important;
        font-family: 'Courier New', monospace;
    }
    
    .form-label {
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .invalid-feedback {
        background-color: #ff4757;
        color: white;
        padding: 0.5rem;
        margin-top: 0.5rem;
        border: 2px solid black;
        box-shadow: 2px 2px 0px 0px black;
    }
    
    .is-invalid {
        border: 2px solid #ff4757 !important;
        box-shadow: 0 0 0 2px #ff4757;
    }
</style>
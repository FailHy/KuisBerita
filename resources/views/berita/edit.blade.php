@extends('layouts.app')

@section('title', 'EDIT BERITA')

@section('content')
<div class="card mb-5">
    <div class="card-header bg-warning text-black" style="border-bottom: 3px solid black;">
        <h3 class="mb-0">EDIT BERITA</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('berita.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="judul" class="form-label fw-bold">JUDUL BERITA*</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                       id="judul" name="judul" value="{{ old('judul', $article->judul) }}" required
                       style="border: 2px solid black; padding: 0.75rem;">
                @error('judul')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="gambar" class="form-label fw-bold">GAMBAR BERITA</label>
                @if($article->gambar)
                    <div class="mb-3 p-2" style="border: 2px solid black; display: inline-block;">
                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Current Image" style="max-height: 200px; border: 2px solid black;">
                        <div class="mt-2 fw-bold text-center">GAMBAR SEKARANG</div>
                    </div>
                @endif
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                       id="gambar" name="gambar" style="border: 2px solid black; padding: 0.75rem;" required>
                @error('gambar')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
                <small class="text-muted fw-bold">BIARKAN KOSONG JIKA TIDAK INGIN MENGUBAH GAMBAR</small>
            </div>
            
            <div class="mb-4">
                <label for="penulis" class="form-label fw-bold">PENULIS*</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                       id="penulis" name="penulis" value="{{ old('penulis', $article->penulis) }}" required
                       style="border: 2px solid black; padding: 0.75rem;">
                @error('penulis')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="isi" class="form-label fw-bold">ISI BERITA*</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" 
                          id="isi" name="isi" rows="8" required
                          style="border: 2px solid black; padding: 0.75rem;">{{ old('isi', $article->isi) }}</textarea>
                @error('isi')
                    <div class="invalid-feedback fw-bold">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-warning px-4 py-2 fw-bold text-black" style="border: 2px solid black;">
                    <i class="bi bi-save me-2"></i> PERBARUI BERITA
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
        font-family: 'Courier New', monospace;
        letter-spacing: 0.05em;
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
    
    .btn-warning {
        background-color: #ffd700 !important;
    }
    
    .btn-warning:hover {
        background-color: #ffcc00 !important;
    }
</style>
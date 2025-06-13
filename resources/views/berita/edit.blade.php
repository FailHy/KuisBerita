@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-white">
        <h4>Edit Berita</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('berita.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Berita</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $article->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Berita</label>
                @if($article->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Current Image" style="max-height: 200px;">
                    </div>
                @endif
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis', $article->penulis) }}" required>
                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Berita</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="6" required>{{ old('isi', $article->isi) }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Berita</button>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Buat Berita Baru')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Buat Berita Baru</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Berita*</label>
        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
               id="judul" name="judul" value="{{ old('judul') }}" required>
        @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="isi" class="form-label">Isi Berita*</label>
        <textarea class="form-control @error('isi') is-invalid @enderror" 
                  id="isi" name="isi" rows="6" required>{{ old('isi') }}</textarea>
        @error('isi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis*</label>
        <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
               id="penulis" name="penulis" value="{{ old('penulis', Auth::user()->name) }}" required>
        @error('penulis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
               id="gambar" name="gambar">
        @error('gambar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan Berita</button>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
</form>
    </div>
</div>
@endsection
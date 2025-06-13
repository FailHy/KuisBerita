@extends('layouts.app')

@section('title', $article->judul)

@section('content')
<div class="card mb-4">
    @if($article->gambar)
        <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top" alt="{{ $article->judul }}" style="max-height: 400px; object-fit: cover;">
    @endif
    <div class="card-body">
        <h1 class="card-title">{{ $article->judul }}</h1>
        <p class="card-text text-muted">Oleh: {{ $article->penulis }} | {{ $article->created_at->format('d F Y') }}</p>
        <div class="card-text my-4">
            {!! nl2br(e($article->isi)) !!}
        </div>
        @auth
            @if(auth()->user()->isAdmin())
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('berita.edit', $article->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('berita.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>

<a href="{{ route('berita.index') }}" class="btn btn-outline-primary">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
</a>
@endsection
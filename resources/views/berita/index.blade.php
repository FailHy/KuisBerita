@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="hero-section text-center rounded">
    <h1 class="display-4 fw-bold">Selamat Datang di Portal Berita</h1>
    <p class="lead">Temukan berita terbaru dan terupdate setiap hari</p>
</div>

<div class="row">
    @foreach($articles as $article)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            @if($article->gambar)
                <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top article-image" alt="{{ $article->judul }}">
            @else
                <div class="card-img-top article-image bg-secondary d-flex align-items-center justify-content-center">
                    <span class="text-white">Tidak ada gambar</span>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <p class="card-text text-muted">Oleh: {{ $article->penulis }}</p>
                <p class="card-text">{{ Str::limit($article->isi, 100) }}</p>
                <a href="{{ route('berita.show', $article->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
            <div class="card-footer text-muted">
                {{ $article->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $articles->links() }}
</div>
@endsection
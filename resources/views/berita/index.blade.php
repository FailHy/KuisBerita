@extends('layouts.app')

@section('title', 'BERANDA')

@section('content')
<div class="hero-section text-center mb-5" style="
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://source.unsplash.com/random/1200x400/?news');
    background-size: cover;
    background-position: center;
    padding: 100px 0;
    border: 3px solid black;
    box-shadow: 6px 6px 0px 0px black;
    position: relative;
">
    <div style="position: relative; z-index: 1;">
        <h1 class="display-4 fw-bold text-white" style="text-shadow: 3px 3px 0px black;">SELAMAT DATANG DI PORTAL BERITA</h1>
        <p class="lead text-white fw-bold" style="text-shadow: 2px 2px 0px black;">TEMUKAN BERITA TERBARU DAN TERUPDATE SETIAP HARI</p>
    </div>
</div>

<div class="row g-4">
    @foreach($articles as $article)
    <div class="col-md-4 mb-4">
        <div class="card h-100" style="border: 3px solid black; box-shadow: 4px 4px 0px 0px black;">
            @if($article->gambar)
                <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top article-image" alt="{{ $article->judul }}" 
                     style="height: 200px; object-fit: cover; border-bottom: 3px solid black;">
            @else
                <div class="card-img-top article-image d-flex align-items-center justify-content-center" 
                     style="height: 200px; background-color: #000000; border-bottom: 3px solid black;">
                    <span class="text-white fw-bold">TIDAK ADA GAMBAR</span>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title fw-bold" style="text-transform: uppercase;">{{ Str::limit($article->judul, 50) }}</h5>
                <p class="card-text text-muted fw-bold">OLEH: {{ Str::upper($article->penulis) }}</p>
                <p class="card-text">{{ Str::limit($article->isi, 100) }}</p>
                <a href="{{ route('berita.show', $article->id) }}" class="btn btn-primary fw-bold" 
                   style="border: 2px solid black; box-shadow: 3px 3px 0px 0px black;">
                    BACA SELENGKAPNYA
                </a>
            </div>
            <div class="card-footer text-muted fw-bold" style="border-top: 3px solid black; background-color: #f8f9fa;">
                {{ Str::upper($article->created_at->diffForHumans()) }}
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="pagination" style="border: 2px solid black; padding: 0.5rem; box-shadow: 3px 3px 0px 0px black;">
        {{ $articles->links() }}
    </div>
</div>

<style>
    .article-image {
        transition: transform 0.3s ease;
    }
    
    .page-link {
        border: 2px solid black !important;
        color: black !important;
        font-weight: bold;
        margin: 0 3px;
    }
    
    .page-item.active .page-link {
        background-color: black !important;
        color: white !important;
        box-shadow: 2px 2px 0px 0px #ff4757;
    }
    
    .page-link:hover {
        background-color: #fffa65 !important;
        color: black !important;
    }
</style>
@endsection
@extends('layouts.app')

@section('title', Str::upper($article->judul))

@section('content')
<div class="mb-5" style="
    border: 3px solid black;
    box-shadow: 6px 6px 0px 0px black;
    display: inline-block;
    max-width: 100%;
">
    @if($article->gambar)
    <div style="border-bottom: 3px solid black;">
        <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}" 
             style="display: block; max-width: 100%; height: auto;">
    </div>
    @endif
    
    <div class="p-4" style="background: white;">
        <h1 class="fw-bold mb-3" style="text-transform: uppercase; font-size: 1.8rem;">{{ Str::upper($article->judul) }}</h1>
        <p class="text-muted fw-bold mb-4" style="letter-spacing: 0.05em;">
            OLEH: {{ Str::upper($article->penulis) }} | {{ Str::upper($article->created_at->format('d F Y')) }}
        </p>
        
        <div style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
            {!! nl2br(e($article->isi)) !!}
        </div>
        
        @auth
            @if(auth()->user()->isAdmin())
            <div class="d-flex flex-wrap justify-content-end gap-3" style="margin-top: 2rem;">
                <a href="{{ route('berita.edit', $article->id) }}" class="btn btn-warning fw-bold px-4 py-2" 
                   style="border: 2px solid black; box-shadow: 3px 3px 0px 0px black;">
                    <i class="bi bi-pencil me-2"></i> EDIT
                </a>
                <form action="{{ route('berita.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-bold px-4 py-2" 
                            style="border: 2px solid black; box-shadow: 3px 3px 0px 0px black;"
                            onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS BERITA INI?')">
                        <i class="bi bi-trash me-2"></i> HAPUS
                    </button>
                </form>
            </div>
            @endif
        @endauth
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ route('berita.index') }}" class="btn btn-outline-dark fw-bold px-4 py-2" 
       style="border: 2px solid black; box-shadow: 3px 3px 0px 0px black;">
        <i class="bi bi-arrow-left me-2"></i> KEMBALI KE DAFTAR BERITA
    </a>
</div>

<style>
    @media (max-width: 768px) {
        h1 {
            font-size: 1.5rem !important;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        
        .d-flex.justify-content-end {
            justify-content: center !important;
        }
    }
</style>
@endsection
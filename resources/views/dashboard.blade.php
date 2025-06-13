@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Berita Saya</h2>

    @if($articles->isEmpty())
        <p>Belum ada berita yang Anda buat.</p>
    @else
        <ul class="list-group">
            @foreach($articles as $article)
                <li class="list-group-item">
                    <strong>{{ $article->judul }}</strong><br>
                    <small>{{ $article->created_at->format('d M Y') }}</small>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('admin')->except(['index', 'show']);
    // }
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('berita.index', compact('articles'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('article_images', 'public');
        }

        $validated['user_id'] = Auth::user()->id;
        Article::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }
    public function show(Article $article)
    {
        return view('berita.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('berita.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isi' => 'required',
            'penulis' => 'required|max:100',
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($article->gambar);
            $validated['gambar'] = $request->file('gambar')->store('article_images', 'public');
        }

        $article->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->gambar);
        $article->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
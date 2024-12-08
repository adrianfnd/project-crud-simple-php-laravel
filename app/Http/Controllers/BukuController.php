<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    public function index()
    {
        $books = Buku::all();
        return view('admin.buku.index', compact('books'));
    }

    public function create()
    {
        return view('admin.buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'cover_buku' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:Fiksi,Non-Fiksi,Referensi,Bacaan Anak,Teknologi',
            'stok' => 'required|integer',
        ], [
            'judul_buku.required' => 'Judul buku harus diisi.',
            'penulis.required' => 'Penulis harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'cover_buku.required' => 'Cover buku harus diisi.',
            'tahun_terbit.required' => 'Tahun terbit harus diisi.',
            'penerbit.required' => 'Penerbit harus diisi.',
            'kategori.required' => 'Kategori harus diisi.',
            'stok.required' => 'Stok harus diisi.',
        ]);

        $coverName = $this->uploadImage($request->file('cover_buku'));

        $book = new Buku($request->except('cover_buku'));
        $book->cover_buku = $coverName;
        $book->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show($id)
    {
        $book = Buku::findOrFail($id);
        return view('admin.buku.detail', compact('book'));
    }

    public function edit($id)
    {
        $book = Buku::findOrFail($id);
        return view('admin.buku.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:Fiksi,Non-Fiksi,Referensi,Bacaan Anak,Teknologi',
            'stok' => 'required|integer',
        ], [
            'judul_buku.required' => 'Judul buku harus diisi.',
            'penulis.required' => 'Penulis harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'tahun_terbit.required' => 'Tahun terbit harus diisi.',
            'penerbit.required' => 'Penerbit harus diisi.',
            'kategori.required' => 'Kategori harus diisi.',
            'stok.required' => 'Stok harus diisi.',
        ]);

        $book = Buku::findOrFail($id);

        if ($request->hasFile('cover_buku')) {
            $this->deleteImage($book->cover_buku);

            $coverName = $this->uploadImage($request->file('cover_buku'));
            $book->cover_buku = $coverName;
        }

        $book->update($request->except('cover_buku'));

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $book = Buku::findOrFail($id);

        $this->deleteImage($book->cover_buku);

        $book->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    private function uploadImage($file)
    {
        $randomNumber = Str::random(10);
        $coverName = $randomNumber . '_' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/buku'), $coverName);

        return $coverName;
    }

    private function deleteImage($coverName)
    {
        $imagePath = public_path('assets/buku/' . $coverName);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}

@extends('admin.layouts.app')

@section('content')
<div class="page-title">
  <div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
      <h3>Detail Buku</h3>
      <p class="text-subtitle text-muted">
        Lihat detail lengkap buku yang Anda pilih.
      </p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<section class="section">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Informasi Buku</h4>
    </div>

    <div class="card-body">
      <div class="row mb-2">
        <div class="col-md-3 mb-3 text-center">
          <img src="{{ asset('assets/buku/' . $book->cover_buku) }}" alt="{{ $book->judul_buku }}" class="img-fluid img-thumbnail" style="max-height: 250px;">
        </div>

        <div class="col-md-9">
          <div class="form-group mb-3">
            <label for="judul_buku"><i class="bi bi-book-fill"></i> Judul Buku:</label>
            <p class="font-weight-bold">{{ $book->judul_buku }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="penulis"><i class="bi bi-person-fill"></i> Penulis:</label>
            <p>{{ $book->penulis }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="harga"><i class="bi bi-cash-coin"></i> Harga (IDR):</label>
            <p>{{ 'Rp. ' . number_format($book->harga, 0, ',', '.') }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="tahun_terbit"><i class="bi bi-calendar-check"></i> Tahun Terbit:</label>
            <p>{{ $book->tahun_terbit }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="penerbit"><i class="bi bi-building"></i> Penerbit:</label>
            <p>{{ $book->penerbit }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="deskripsi"><i class="bi bi-file-earmark-text"></i> Deskripsi:</label>
            <p>{{ $book->deskripsi }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="kategori"><i class="bi bi-tags"></i> Kategori:</label>
            <p>{{ $book->kategori }}</p>
          </div>

          <div class="form-group mb-3">
            <label for="stok"><i class="bi bi-boxes"></i> Stok:</label>
            <p>{{ $book->stok }}</p>
          </div>

          <div class="mt-4">
            <a href="{{ route('edit-buku', $book->id) }}" class="btn btn-warning">Edit Buku</a>
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

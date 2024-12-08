@extends('admin.layouts.app')

@section('content')
<div class="page-title">
  <div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
      <h3>Edit Buku</h3>
      <p class="text-subtitle text-muted">
        Update informasi buku seperti judul, penulis, harga, dan lainnya.
      </p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Buku</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<section class="section">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Form Edit Buku</h4>
    </div>

    <div class="card-body">

      <form id="editBookForm" method="POST" action="{{ route('update-buku', $book->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="judul_buku">Judul Buku</label>
          <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ old('judul_buku', $book->judul_buku) }}" required>
          @error('judul_buku')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="penulis">Penulis</label>
          <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $book->penulis) }}" required>
          @error('penulis')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="harga">Harga (IDR)</label>
          <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $book->harga) }}" required>
          @error('harga')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="tahun_terbit">Tahun Terbit</label>
          <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required>
          @error('tahun_terbit')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="penerbit">Penerbit</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}" required>
          @error('penerbit')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="cover_buku">Cover Buku</label>
          <input type="file" class="form-control-file" id="cover_buku" name="cover_buku" onchange="previewImage(event)">
          <small class="form-text text-muted">Upload cover buku baru jika Anda ingin mengganti yang lama.</small>
          <div class="mt-2">
            <img id="preview-cover" class="img-thumbnail" style="max-width: 200px; display:none;">
            <img id="current-cover" src="{{ asset('assets/buku/' . $book->cover_buku) }}" alt="{{ $book->judul_buku }}" class="img-thumbnail" style="max-width: 200px;">
          </div>
          @error('cover_buku')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi Buku</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $book->deskripsi) }}</textarea>
          @error('deskripsi')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select class="form-control" id="kategori" name="kategori" required>
            <option value="Fiksi" {{ old('kategori', $book->kategori) == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
            <option value="Non-Fiksi" {{ old('kategori', $book->kategori) == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
            <option value="Referensi" {{ old('kategori', $book->kategori) == 'Referensi' ? 'selected' : '' }}>Referensi</option>
            <option value="Bacaan Anak" {{ old('kategori', $book->kategori) == 'Bacaan Anak' ? 'selected' : '' }}>Bacaan Anak</option>
            <option value="Teknologi" {{ old('kategori', $book->kategori) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
          </select>
          @error('kategori')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="stok">Stok Buku</label>
          <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $book->stok) }}" required>
          @error('stok')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mt-4">
          <button type="submit" class="btn btn-primary" id="submitButton">Update Buku</button>
          <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function previewImage(event) {
    const reader = new FileReader();
    const file = event.target.files[0];
    
    if (file) {
      reader.onload = function() {
        const preview = document.getElementById('preview-cover');
        preview.src = reader.result;
        preview.style.display = 'block';
        document.getElementById('current-cover').style.display = 'none';
      }
      reader.readAsDataURL(file);
    }
  }

  document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault();

    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data buku akan diperbarui.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Update!',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('editBookForm').submit();
      }
  });
  });
</script>

@endsection

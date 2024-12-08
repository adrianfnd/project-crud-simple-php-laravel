@extends('admin.layouts.app')

@section('content')
<div class="page-title">
  <div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
      <h3>Tambah Buku</h3>
      <p class="text-subtitle text-muted">
        Input data buku baru dengan detail seperti judul, penulis, harga, kategori, dan lainnya.
      </p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<section class="section">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Input Buku Baru</h4>
    </div>

    <div class="card-body">

      <form id="addBookForm" method="POST" action="{{ route('store-buku') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="judul_buku">Judul Buku</label>
              <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" required>
              @error('judul_buku')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="penulis">Penulis</label>
              <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Nama Penulis" required>
              @error('penulis')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="harga">Harga (IDR)</label>
              <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Buku" required>
              @error('harga')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="tahun_terbit">Tahun Terbit</label>
              <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required>
              @error('tahun_terbit')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="penerbit">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Nama Penerbit" required>
              @error('penerbit')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="cover_buku">Cover Buku</label>
              <input type="file" class="form-control-file" id="cover_buku" name="cover_buku" required onchange="previewImage(event)">
              <small class="text-muted">Upload cover buku dalam format gambar</small>
              <div class="mt-2">
                <img id="coverPreview" class="img-thumbnail" style="max-width: 200px;" />
              </div>
              @error('cover_buku')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi Buku</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Buku"></textarea>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="kategori">Kategori</label>
              <select class="form-control" id="kategori" name="kategori" required>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Referensi">Referensi</option>
                <option value="Bacaan Anak">Bacaan Anak</option>
                <option value="Teknologi">Teknologi</option>
              </select>
              @error('kategori')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="stok">Stok Buku</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Jumlah Stok Buku" required>
              @error('stok')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mt-4">
              <button type="submit" class="btn btn-primary" id="submitButton">Tambah Buku</button>
              <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('coverPreview');
      output.style.display = 'block';
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault();

    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data buku akan ditambahkan.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Tambah Buku!',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('addBookForm').submit();
      }
    });
  });
</script>

@endsection

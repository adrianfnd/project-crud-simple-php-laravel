@extends('admin.layouts.app')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tabel Buku</h3>
            <p class="text-subtitle text-muted">Daftar buku yang tersedia</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tabel Buku</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>

      <section class="section">
        <div class="row" id="basic-table">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Tabel Buku</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-end">
                    <a href="{{ route('create-buku') }}" class="btn btn-primary">Tambah Buku</a>
                  </div>
                </div>
              </div>              
              <div class="card-content">
                <div class="card-body">
                  @if(session('success'))
                  <script>
                    Swal.fire({
                      icon: 'success',
                      title: 'Berhasil!',
                      text: '{{ session('success') }}',
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });
                  </script>
                  @endif

                  @if(session('error'))
                  <script>
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal!',
                      text: '{{ session('error') }}',
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });
                  </script>
                  @endif

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Judul Buku</th>
                          <th>Penulis</th>
                          <th>Harga</th>
                          <th>Cover Buku</th>
                          <th>Tahun Terbit</th>
                          <th>Stok</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($books as $index => $book)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>{{ $book->judul_buku }}</td>
                          <td>{{ $book->penulis }}</td>
                          <td>{{ 'Rp. ' . number_format($book->harga, 0, ',', '.') }}</td>
                          <td><img src="/assets/buku/{{ $book->cover_buku }}" alt="{{ $book->judul_buku }}" width="50"></td>
                          <td>{{ $book->tahun_terbit }}</td>
                          <td>{{ $book->stok }}</td>
                          <td>
                            <a href="{{ route('show-buku', $book->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('edit-buku', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('delete-buku', $book->id) }}" method="POST" style="display: inline;" class="delete-form">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger delete-btn">Hapus</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function(button) {
      button.addEventListener('click', function(event) {
        event.preventDefault();

        const form = this.closest('form');

        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Anda tidak bisa membatalkan ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  });

</script>
@endsection

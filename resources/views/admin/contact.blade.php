@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Contact Us</h3>
        </div>
        <div class="card-body">
          <p>Ini adalah halaman Contact. Silakan hubungi kami melalui form di bawah ini.</p>
          
          <!-- Contact Form -->
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" placeholder="Masukkan nama">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subjek</label>
              <input type="text" class="form-control" id="subject" placeholder="Subjek pesan">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Pesan</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Tulis pesan Anda..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


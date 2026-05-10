@extends('template')
@section('content')

    <div class="hero-wrap" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 25%), url('https://themewagon.github.io/direngine/images/bg_2.jpg'); background-size: cover; background-position: center; height: 50vh; min-height: 400px;">
      <div class="overlay"></div>
      <div class="container" style="height: 100%;">
        <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: 100%;" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Rekomendasi</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Rekomendasi Wisata</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-white">
      <div class="container">
        
        <!-- Form Pencarian Rekomendasi -->
        <div class="row justify-content-center mb-5 pb-3 mt-4">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4" style="font-weight: 800; color: #000; font-size: 32px;">Dapatkan Rekomendasi Paket Wisata<br>Terbaik Anda</h2>
          </div>
        </div>
        
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 col-lg-6 ftco-animate">
                <form action="#" method="POST" class="p-4 p-md-0" style="background: transparent;">
                    <!-- Tambahkan @csrf jika menggunakan framework Laravel standar untuk form POST -->
                    @csrf
                    <div class="form-group mb-4">
                        <label for="budget" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">Budget</label>
                        <input type="text" id="budget" name="budget" class="form-control" placeholder="masukkan budget anda" style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="kategori" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">Kategori Wisata</label>
                        <input type="text" id="kategori" name="kategori" class="form-control" placeholder="masukkan kategori wisata, contoh: wisata alam, budaya dll" style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="fasilitas" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">Fasilitas Yang Diinginkan</label>
                        <input type="text" id="fasilitas" name="fasilitas" class="form-control" placeholder="masukkan fasilitas yang anda inginkan, contoh: mobil, tiket masuk, air mineral" style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mb-5">
                        <label for="durasi" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">Durasi Perjalanan</label>
                        <input type="text" id="durasi" name="durasi" class="form-control" placeholder="masukkan durasi perjalanan anda, contoh: One Day, 2D1N, 3D2N dll" style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <button type="submit" class="btn w-100" style="background-color: #000; color: #fff; border-radius: 6px; font-weight: 700; height: 55px; font-size: 15px; border: none;">Cari Rekomendasi Paket Wisata</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hasil Rekomendasi -->
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4" style="font-weight: 700;">Rekomendasi Yang Sesuai Buat Kamu</h2>
          </div>
        </div>

        <div class="row d-flex">
          <!-- Card 1 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>

          <!-- Card 2 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>

          <!-- Card 3 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>

          <!-- Card 4 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>

          <!-- Card 5 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>

        </div>
      </div>
    </section>

@endsection

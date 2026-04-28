@extends('template')
@section('content')

    <div class="hero-wrap" style="background: linear-gradient(rgba(129, 218, 209, 0.4), rgba(129, 218, 209, 0.4)), url('https://themewagon.github.io/direngine/images/bg_3.jpg'); background-size: cover; background-position: center; height: 50vh; min-height: 400px;">
      <div class="overlay"></div>
      <div class="container" style="height: 100%;">
        <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: 100%;" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Kontak</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hubungi Kami</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Informasi Kontak</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-sm-6 col-md-3 mb-4">
            <p><span>Alamat:</span> Jl. Jenderal Sudirman No.10, Penganjuran, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68415</p>
          </div>
          <div class="col-sm-6 col-md-3 mb-4">
            <p><span>Telepon:</span> <a href="tel://1234567920">+62 812 3456 7890</a></p>
          </div>
          <div class="col-sm-6 col-md-3 mb-4">
            <p><span>Email:</span> <a href="mailto:info@kutamasya.id">info@kutamasya.id</a></p>
          </div>
          <div class="col-sm-6 col-md-3 mb-4">
            <p><span>Website:</span> <a href="#">kutamasya.id</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5 mb-5 mb-md-0">
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email Anda">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subjek / Tujuan Wisata">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Tulis pesan atau pertanyaan Anda di sini..."></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id="map">
             <!-- Google Map Iframe as alternative to map js -->
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126344.27043810141!2d114.2882890691503!3d-8.219213197171413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd14522a106eab3%3A0x6b107e3a3987515!2sBanyuwangi%2C%20Banyuwangi%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1714030616993!5m2!1sen!2sid" width="100%" height="100%" style="border:0; min-height:400px; border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section>

@endsection

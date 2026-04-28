@extends('template')
@section('content')

    <div class="hero-wrap" style="background: linear-gradient(rgba(129, 218, 209, 0.4), rgba(129, 218, 209, 0.4)), url('https://themewagon.github.io/direngine/images/bg_2.jpg'); background-size: cover; background-position: center; height: 50vh; min-height: 400px;">
      <div class="overlay"></div>
      <div class="container" style="height: 100%;">
        <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: 100%;" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Tentang Kami</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tentang Kami</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-md-flex">
          <div class="col-md-6 ftco-animate img about-image" style="background-image: url(https://themewagon.github.io/direngine/images/about.jpg);">
          </div>
          <div class="col-md-6 ftco-animate p-md-5">
            <div class="row">
              <div class="col-md-12 nav-link-wrap mb-5">
                <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">Apa yang Kami Lakukan</a>

                  <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Misi Kami</a>

                  <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Tujuan Kami</a>
                </div>
              </div>
              <div class="col-md-12 d-flex align-items-center">
                
                <div class="tab-content ftco-animate" id="v-pills-tabContent">

                  <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
                    <div>
                      <h2 class="mb-4">Menyediakan Pengalaman Wisata Terbaik</h2>
                      <p>Kutamasya.id hadir untuk memberikan kemudahan bagi para wisatawan dalam menjelajahi keindahan Banyuwangi dan sekitarnya. Kami menawarkan berbagai paket wisata, dari Open Trip, Private Trip, hingga perjalanan kustom sesuai kebutuhan Anda.</p>
                      <p>Dengan panduan dari para ahli lokal, setiap perjalanan bersama kami dijamin akan menjadi momen tak terlupakan.</p>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
                    <div>
                      <h2 class="mb-4">Misi Pelayanan Profesional</h2>
                      <p>Misi kami adalah memberikan pelayanan pariwisata profesional dengan mengedepankan kepuasan, keamanan, dan kenyamanan pelanggan.</p>
                      <p>Kami juga berkomitmen untuk memberdayakan masyarakat lokal dan mempromosikan pariwisata berkelanjutan di setiap destinasi yang kami kunjungi.</p>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
                    <div>
                      <h2 class="mb-4">Menjadi Agen Wisata Terdepan</h2>
                      <p>Tujuan utama kami adalah menjadi pionir penyedia layanan wisata terbaik di ujung timur Pulau Jawa yang dikenal di kancah nasional maupun internasional.</p>
                      <p>Kami terus berinovasi untuk memberikan penawaran wisata yang menarik dengan harga yang kompetitif.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(https://themewagon.github.io/direngine/images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Beberapa Fakta Menarik</h2>
            <span class="subheading">Lebih dari ribuan wisatawan telah mempercayakan perjalanannya kepada kami</span>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="15000">0</strong>
		                <span>Pelanggan Puas</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="40">0</strong>
		                <span>Destinasi Wisata</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="87">0</strong>
		                <span>Rekomendasi Hotel</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="50">0</strong>
		                <span>Mitra Restoran</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
          	<span class="subheading">Pelayanan Terbaik</span>
            <h2 class="mb-4 pb-3"><strong>Mengapa</strong> Memilih Kami?</h2>
            <p>Kami memiliki tim profesional yang berdedikasi tinggi untuk memastikan perjalanan wisata Anda aman, nyaman, dan berkesan. Berpengalaman bertahun-tahun di bidang pariwisata Banyuwangi, kami siap memberikan rekomendasi terbaik.</p>
            <p>Kami tidak hanya sekadar mengantar, tapi juga memastikan Anda mendapatkan pengalaman lokal yang autentik dengan harga yang transparan dan terjangkau.</p>
            <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Lihat Paket Wisata</a></p>
          </div>
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Testimoni</span>
            <h2 class="mb-4 pb-3"><strong>Kata</strong> Pelanggan Kami</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(https://themewagon.github.io/direngine/images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">"Perjalanan ke Kawah Ijen sangat berkesan. Guide-nya ramah, transportasinya nyaman, dan harganya sangat sepadan. Sangat direkomendasikan!"</p>
		                    <p class="name">Budi Santoso</p>
		                    <span class="position">Wisatawan dari Jakarta</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(https://themewagon.github.io/direngine/images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">"Tidak perlu repot mikir itinerary, semuanya sudah diatur dengan sangat baik oleh Kutamasya. Fasilitas hotelnya pun memuaskan."</p>
		                    <p class="name">Sari Indah</p>
		                    <span class="position">Wisatawan dari Bandung</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(https://themewagon.github.io/direngine/images/person_3.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">"Pengalaman menjelajahi Taman Nasional Baluran serasa di Afrika. Tim Kutamasya sangat profesional dan tahu spot-spot foto terbaik."</p>
		                    <p class="name">Andi Wijaya</p>
		                    <span class="position">Wisatawan dari Surabaya</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>

@endsection

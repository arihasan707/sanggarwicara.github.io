  <!-- Page Header Start here -->
  <section class="page-header section-notch">
      <div class="overlay">
          <div class="container">
              <h3>Tentang</h3>
          </div><!-- container -->
      </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->

  <!-- About Start here -->
  <section class="about about-two padding-120">
      <div class="container">
          <div class="row">
              <div class="col-lg-6">
                  <div class="about-image">
                      <img src="<?php echo base_url() ?>depan/images/about/about.png" alt="about image" class="img-responsive">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="about-content">
                      <h3>Tentang Sanggar Wicara</h3>
                      <p>Sanggar wicara adalah tempat alternatif tumbuh kembang individu secara alami dan optimal dengan segala potensi yang dimiliki sesuai tingkat perkembangannya.
                          Didirikan sejak 2005, kami bermetamorfosis dari "Tempat Terapi Kura-kura" menjadi "Tempat Terapi Mutiara Bunda" hingga kemudian "Sanggar Wicara" hal ini dilakukan untuk menyikapi dinamika kebutuhan masyarakat.</p>

                  </div><!-- about content -->
              </div>
          </div><!-- row -->
      </div><!-- container -->
  </section><!-- about -->
  <!-- About End here -->



  <!-- Teachers Start here -->
  <section class="teachers teachers-three padding-120">
      <div class="container">
          <div class="section-header">
              <h3>Psikolog & Guru</h3>
          </div>
          <div class="teacher-items">
              <div class="teacher-slider swiper-container">
                  <div class="swiper-wrapper">
                      <?php foreach ($guru as $key) { ?>
                          <div class="teacher-item swiper-slide">
                              <div class="teacher-image">
                                  <img src="<?php echo base_url('assets/images/' . $key->guru_photo); ?>" alt="teacher image" class="img-responsive">
                              </div>
                              <div class="teacher-content">
                                  <h4><a href="#"><?php echo $key->guru_nama ?></a></h4>
                              </div>
                          </div><!-- teacher-item -->
                      <?php } ?>
                  </div><!-- swiper-wrapper -->
              </div><!-- swiper-container -->
          </div><!-- partner-items -->

      </div><!-- container -->
  </section><!-- teacher -->
  <!-- Teachers End here -->
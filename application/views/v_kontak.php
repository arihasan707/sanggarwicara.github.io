  <!-- Page Header Start here -->
  <section class="page-header section-notch">
      <div class="overlay">
          <div class="container">
              <h3>Kontak</h3>
          </div><!-- container -->
      </div><!-- overlay -->
  </section><!-- page header -->
  <!-- Page Header End here -->

  <!-- Contact Start here -->
  <section class="contact contact-page">
      <div class="contact-details padding-120">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-6 col-xs-12">
                      <ul>
                          <li class="contact-item">
                              <span class="icon flaticon-signs"></span>
                              <div class="content">
                                  <h4>Our Location</h4>
                                  <p>218 Sahera Tropical Center Room#7 <br> New Newyork Road 1205</p>
                              </div>
                          </li>
                          <li class="contact-item">
                              <span class="icon flaticon-smartphone"></span>
                              <div class="content">
                                  <h4>Phone Number</h4>
                                  <p>01923-970212, 01776-502993 <br> +2154897369</p>
                              </div>
                          </li>
                          <li class="contact-item">
                              <span class="icon flaticon-message"></span>
                              <div class="content">
                                  <h4>Email Address</h4>
                                  <p>hello@labartisan <br> hello@codexcoder.com</p>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="col-lg-8 col-md-6 col-xs-12">
                      <div class="about-content text-center">
                          <p style="font-weight: bold;">Untuk info lebih lanjut silahkan hubungi kami secara online, agar kami bisa segera membalas.</p>
                          <?php if ($this->session->flashdata('sukses')) { ?>
                              <div class="alert alert-primary" role="alert">
                                  <?php echo $this->session->flashdata('sukses'); ?>
                                  <span> Telah Menghubungi Kami </span>
                              </div>
                          <?php } ?>
                      </div>
                      <form action="<?php echo base_url() . 'kontak/kirim_pesan' ?>" method="post" class="contact-form ">
                          <input type="text" name="xnama" placeholder="Nama" class="contact-input" required>
                          <input type="email" name="xemail" placeholder="@gmail.com" class="contact-input" required>
                          <input type="text" name="xkontak" placeholder="Telepon" class="contact-input" required>
                          <textarea name="xpesan" rows="5" placeholder="Pesan" class="contact-input" required></textarea>
                          <input type="submit" name="submit" value="kirim pesan" class="contact-button">
                      </form>
                  </div>
              </div><!-- row -->
          </div><!-- container -->
      </div><!-- contact-details -->
  </section>
  <!-- Contact End here -->
 <div class="maps">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.567296348259!2d106.74491661431237!3d-6.449556964858976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e94e27e0a68d%3A0x709f015f0b5fc878!2sSanggar%20Wicara!5e0!3m2!1sid!2sid!4v1636244887171!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
 </div>

 <!-- Subscribe Start here -->
 <section class="subscribe subscribe-two">
     <div class="container">
         <div class="row">
             <div class="col-lg-5 col-xs-12">
                 <h3>Join Our Newsletter</h3>
             </div>
             <div class="col-lg-7 col-xs-12">
                 <form action="/">
                     <input type="text" placeholder="Enter your e-mail here">
                     <input type="submit" value="Subscribe Now">
                 </form>
             </div>
         </div><!-- row -->
     </div><!-- container -->
 </section><!-- subscribe -->
 <!-- Subscribe End here -->
 <footer>
     <div class="footer-top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-sm-6 col-xs-12">
                     <div class="footer-item ">
                         <div class="title"><img src="<?php echo base_url(); ?>depan/images/logo.png" alt="logo" class="img-responsive"></div>
                         <div class="footer-about ">
                             <p>Sanggar wicara adalah tempat alternatif tumbuh kembang individu secara alami dan optimal dengan segala potensi yang dimiliki sesuai tingkat perkembangannya.
                                 Didirikan sejak 2005, kami bermetamorfosis dari "Tempat Terapi Kura-kura" menjadi "Tempat Terapi Mutiara Bunda" hingga kemudian "Sanggar Wicara" hal ini dilakukan untuk menyikapi dinamika kebutuhan masyarakat.</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-sm-6 col-xs-12">
                     <div class="footer-item">
                         <h4 class="title">Media Sosial</h4>
                         <div class="footer-about">
                             <ul>
                                 <li><span><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:+6281519913797"> 081519913797</a></li>
                                 <li><span><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:+6282243409418"> 082243409418</a></li>
                                 <li><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><a href="mailto:euishuzaziah.74@gmail.com"> euishuzaziah.74@gmail.com</a></li>
                                 <li><span><i class="fa fa-facebook" aria-hidden="true"></i></span><a href="http://facebook.com/sanggar.wicara.1"> Sanggar Wicara</a></li>
                                 </li>
                                 <li><span><i class="fa fa-instagram" aria-hidden="true"></i></span><a href="http://instagram.com/euishuzaziah_speechtherapist/"> EUIS HUZAZIAH<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_SpeechTherapist</a></li>
                                 </li>

                             </ul>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-sm-6 col-xs-12">
                     <div class="footer-item">
                         <h4 class="title">Recent Photos</h4>
                         <ul class="photos">
                             <?php foreach ($galeri as $key) { ?>
                                 <li><a href="<?php echo base_url('assets/images/' . $key->galeri_gambar); ?>" data-rel="lightcase:myCollection"><img src="<?php echo base_url('assets/images/' . $key->galeri_gambar); ?>" alt="gallery image" class="img-responsive"></a>
                                 </li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>
             </div><!-- row -->
         </div><!-- container -->
     </div><!-- footer top -->
     <div class="footer-bottom">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-xs-12">
                     <p>&copy; 2021. Designed By <a href="#">Ari Hasan</a></p>
                 </div>
                 <div class="col-lg-6 col-xs-12">
                     <ul class="social-default">
                         <li><a href="http://facebook.com/sanggar.wicara.1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                         <li><a href="http://instagram.com/euishuzaziah_speechtherapist/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                         <li><a href="http://twitter.com/huzz_euis"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                         <li><a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=euishuzaziah.74@gmail.com"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                     </ul>
                 </div>
             </div><!-- row -->
         </div><!-- container -->
     </div><!-- footer bottom -->
 </footer>
 <a class="page-scroll scroll-top" href="#scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
 <!-- Footer End here -->


 <!-- jquery -->
 <script src="<?php echo base_url(); ?>depan/assets/js/jquery-1.12.4.min.js"></script>

 <!-- Bootstrap -->
 <script src="<?php echo base_url(); ?>depan/assets/js/bootstrap.bundle.min.js"></script>

 <!-- Isotope -->
 <script src="<?php echo base_url(); ?>depan/assets/js/isotope.min.js"></script>

 <!-- lightcase -->
 <script src="<?php echo base_url(); ?>depan/assets/js/lightcase.js"></script>

 <!-- counterup -->
 <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
 <script src="<?php echo base_url(); ?>depan/assets/js/jquery.counterup.min.js"></script>

 <!-- Swiper -->
 <script src="<?php echo base_url(); ?>depan/assets/js/swiper.jquery.min.js"></script>

 <!--progress-->
 <script src="<?php echo base_url(); ?>depan/assets/js/circle-progress.min.js"></script>

 <!--velocity-->
 <script src="<?php echo base_url(); ?>depan/assets/js/velocity.min.js"></script>

 <!--quick-view-->
 <script src="<?php echo base_url(); ?>depan/assets/js/quick-view.js"></script>

 <!--nstSlider-->
 <script src="<?php echo base_url(); ?>depan/assets/js/jquery.nstSlider.js"></script>

 <!--flexslider-->
 <script src="<?php echo base_url(); ?>depan/assets/js/flexslider-min.js"></script>

 <!--easing-->
 <script src="<?php echo base_url(); ?>depan/assets/js/jquery.easing.min.js"></script>

 <!--coundown-->
 <script src="<?php echo base_url(); ?>depan/assets/js/coundown.js"></script>

 <!-- custom -->
 <script src="<?php echo base_url(); ?>depan/assets/js/custom.js"></script>


 </body>

 </html>
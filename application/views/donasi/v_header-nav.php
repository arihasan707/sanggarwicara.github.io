<body id="scroll-top">
    <!-- Preloader start here -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- Preloader end here -->


    <!-- mobile menu start here -->
    <div class="mobile-menu-area">
        <div class="logo-area">
            <a class="logo" href="index.html"><img src="<?php echo base_url(); ?>depan/images/logo.png" alt="logo" class="img-responsive"></a>
            <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="mobile-menu">
            <ul class="m-menu">
                <li class="dropdown-submenu">
                    <a href="#">Beranda</a>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Tentang</a>
                </li>
                <li class="dropdown-submenu">
                    <a href="#">Layanan</a>
                    <ul class="mobile-submenu">
                        <li><a href="classes.html">Konsultasi</a></li>
                        <li><a href="class-single.html">Tes Psikologi</a></li>
                        <li><a href="class-single.html">Terapi</a></li>
                        <li><a href="class-single.html">Bimbel</a></li>
                        <li><a href="class-single.html">Paud</a></li>
                        <li><a href="class-single.html">Home Schooling</a></li>
                        <li><a href="class-single.html">Pelatihan</a></li>
                        <li><a href="class-single.html">Fun Camp</a></li>
                    </ul>
                </li>

                <li class="dropdown-submenu">
                    <a href="#">Fasilitas</a>

                </li>

                <li class="dropdown-submenu">
                    <a href="#">Galeri</a>
                    <ul class="mobile-submenu">
                        <li><a href="gallery.html">Foto</a></li>
                        <li><a href="gallery-2.html">Video</a></li>

                    </ul>
                </li>

                <li class="dropdown-submenu">
                    <a href="#">Kegiatan</a>
                    <ul class="mobile-submenu">
                        <li><a href="blog.html">Agenda</a></li>
                        <li><a href="single.html">Pengumuman</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Kontak</a></li>
            </ul>
        </div>
    </div>
    <!-- mobile menu ending here -->


    <header>
        <div class="header-top">
            <div class="container">
                <div class="ht-area">
                    <ul class="left">
                        <?php foreach ($pengumuman as $key) { ?>
                            <marquee>
                                <li style="font-weight: bold;"><?php echo $key->pengumuman_deskripsi ?>
                                </li>
                            </marquee>
                        <?php } ?>
                    </ul>
                    <ul class="right">
                        <li><a href='http://facebook.com/sanggar.wicara.1' title='Facebook'><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href='http://instagram.com/euishuzaziah_speechtherapist/' title='Instagram'><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href='http://twitter.com/huzz_euis' title='Twitter'><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href='https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=euishuzaziah.74@gmail.com' title='Gmail'><i class="fa fa-google" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-menu">
            <div class="container">
                <div class="row no-gutters">
                    <nav class="main-menu-area w-100">
                        <div class="logo-area">
                            <a class="" href="index.html"><img src="<?php echo base_url(); ?>depan/images/logo.png" alt="logo" class="img-responsive"></a>
                            <button type="button" class="navbar-toggle collapsed d-md-none" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="menu-area">


                            <ul class="menu">
                                <li class="dropdown">
                                    <a href="<?php echo base_url('home') ?>">Beranda </a>

                                </li>
                                <li>
                                    <a href="<?php echo base_url('home/tentang') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tentang</a>

                                </li>
                                <li class="dropdown">
                                    <a href="<?php echo base_url('home/layanan') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Layanan <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('detailLayanan') ?>">Konsultasi</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/tes_psikologi') ?>">Tes Psikologi</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/terapi') ?>">Terapi</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/bimbel') ?>">Bimbel</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/paud') ?>">Paud</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/home_schooling') ?>">Home Schooling</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/pelatihan') ?>">Pelatihan</a></li>
                                        <li><a href="<?php echo base_url('detailLayanan/fun_camp') ?>">Fun Camp</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fasilitas</a>

                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="classes.html">Foto</a></li>
                                        <li><a href="class-single.html">Video</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kegiatan <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="classes.html">Agenda</a></li>
                                        <li><a href="class-single.html">Pengumuman</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Kontak</a></li>
                            </ul>
                            <form class="menu-search-form">
                                <input type="text" name="search" placeholder="Search here...">
                                <span class="menu-search-close"><i class="fa fa-times" aria-hidden="true"></i></span>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header End here -->
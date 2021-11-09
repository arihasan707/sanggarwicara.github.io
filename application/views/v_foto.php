<section class="page-header section-notch">
    <div class="overlay">
        <div class="container">
            <h3>Galeri Foto</h3>
        </div><!-- container -->
    </div><!-- overlay -->
</section><!-- page header -->
<!-- Page Header End here -->

<!-- Gallery Start here -->
<section class="gallery padding-120">
    <div class="container">
        <div class="gallery-items">
            <?php foreach ($foto as $key) { ?>
                <div class="gallery-item branding packing">
                    <div class="gallery-image">
                        <img src="<?php echo base_url('assets/images/' . $key->galeri_gambar); ?>" alt="gallery image" class="img-responsive">
                        <div class="gallery-overlay">
                            <div class="bg"></div>
                        </div>
                        <div class="gallery-content">
                            <a href="<?php echo base_url('assets/images/' . $key->galeri_gambar); ?>" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>
                            <h4><?php echo $key->galeri_judul ?></h4>
                            <span>By: Sanggar Wicara</span>
                        </div>
                    </div>
                </div><!-- gallery item -->
            <?php } ?>
        </div><!-- gallery items -->
    </div><!-- container -->
</section><!-- gallery -->
<!-- Gallery End here -->
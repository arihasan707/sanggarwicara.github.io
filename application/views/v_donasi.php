<?php
$jumlahuangperbank = $this->db->query("SELECT bank.bank,sum(donasi.jumlah) as jumlahUang FROM `donasi` inner join bank on(bank.idBank=donasi.idBank) where donasi.status='valid'")->row();

$jumlahuangkeluar = $this->db->query("SELECT sum(jumlah) as jumlahuang from pengeluaran")->row();
?>

<section><img src="<?php echo base_url() ?>depan/images/background/donasi.jpg" alt=""></section>

<!-- facility Start here -->
<section class="facility facility-two p-5">
    <div class="container">
        <div class="facility-items">
            <div class="facility-item">
                <div class="front-part">
                    <span class="icon-two flaticon-avatar"></span>
                    <h4>Donasi Masuk</h4>
                </div>
                <div class="back-part">
                    <span class="icon-two flaticon-avatar"></span>
                    <h4>Donasi Masuk</h4>
                    <h4><?php echo "Rp. " . number_format($jumlahuangperbank->jumlahUang, 2, ',', '.'); ?></h4>
                </div>
            </div><!-- facility item -->
            <div class="facility-item">
                <div class="front-part">
                    <span class="icon-two flaticon-world"></span>
                    <h4>Donasi Tersalurkan</h4>
                </div>
                <div class="back-part">
                    <span class="icon-two flaticon-world"></span>
                    <h4>Donasi Tersalurkan</h4>
                    <h4><?php echo "Rp. " . number_format($jumlahuangkeluar->jumlahuang, 2, ',', '.'); ?></h4>
                </div>
            </div><!-- facility item -->
            <div class="facility-item">
                <div class="front-part">
                    <span class="icon-two flaticon-line-chart"></span>
                    <h4>Sisa Total Donasi</h4>
                </div>
                <div class="back-part">
                    <span class="icon-two flaticon-line-chart"></span>
                    <h4>Sisa Total Donasi</h4>
                    <h4><?php echo "Rp. " . number_format($jumlahuangperbank->jumlahUang - $jumlahuangkeluar->jumlahuang, 2, ',', '.'); ?></h4>
                </div>
            </div><!-- facility item -->
        </div><!-- facility items -->
    </div><!-- container -->
</section><!-- facility -->
<!-- facility End here -->

<!-- About Start here -->
<section class="about about-two padding-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="<?php echo base_url() ?>depan/images/mandiri.png" alt="about image" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h3>About Our KidsAcademy</h3>
                    <p>Enthusiasticay diseminate competitive oportunitie through transparent an actions Compelngly seize viral
                        schemas through intermandated creative is adiea sources. Enthusiasticay plagiarize clientcentered
                        relationship for the covalent experiences. Distinctively architect 24/365 service for wireless is
                        ebusiness ahosfluorescently Efficiently comunicate coperative methods of empowerment awesome athrough
                        Monotonectaly myocardinate cross and functional niche markets and an functional.</p>
                    <ul>
                        <li><a href="#" class="button-default">Read More</a></li>
                        <li><a href="#" class="button-default">Buy Now</a></li>
                    </ul>
                </div><!-- about content -->
            </div>
        </div><!-- row -->
    </div><!-- container -->
</section><!-- about -->
<!-- About End here -->
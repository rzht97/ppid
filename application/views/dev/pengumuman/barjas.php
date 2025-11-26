	<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pengumuman - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>
</head>

<body>

    

    <div class="preloader">
        <div class="preloader__image"></div>
        <!-- /.preloader__image -->
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?php $this->load->view("dev/partials/header.php") ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="page-header-shape-1"></div>
            <!-- /.page-header-shape-1 -->
            <div class="page-header-shape-2"></div>
            <!-- /.page-header-shape-2 -->
            <div class="page-header-shape-3"></div>
            <!-- /.page-header-shape-3 -->
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index-2.html">Beranda</a></li>
                        <li><span>/</span></li>
                        <li><a>Berita</a></li>
                    </ul>
                    <h2>PENGUMUMAN</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Single Start-->
        <section class="services-one services-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="<?= base_url()?>upload/pengumuman/sirup.png" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a>SIRUP</a>
                                </h3>
                                <a href="https://sirup.lkpp.go.id/sirup/rekap/penyedia/D118" class="services-one__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="<?= base_url()?>upload/pengumuman/barjas2.jpg" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a>Pengadaan Barang & Jasa</a></h3>
                                
                                <a href="https://spse.inaproc.id/sumedangkab" class="services-one__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="200ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="assets/images/services/services-page-img-3.jpg" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a>Proyek Strategis Pemerintah Daerah Kab. Sumedang</a>
                                </h3>
                                <a href="https://ppid.sumedangkab.go.id/index.php/pub/dip/detaildip/dksjdks23847s0sd" class="services-one__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="<?= base_url()?>upload/pengumuman/lhkpn.png" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a>LHKPN</a></h3>
                                <a href="business-growth.html" class="services-one__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="400ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="assets/images/services/services-page-img-5.jpg" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="financial-advice.html">LPPD</a>
                                </h3>
                                <a href="financial-advice.html" class="services-one__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="500ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="<?= base_url()?>upload/pengumuman/pengumuman.png" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="https://bkpsdm.sumedangkab.go.id/bkd/Home/berita/">Pengumuman Penerimaan Calon Pegawai dan./ Pejabat Negara</a></h3>
                                <a href="" class="services-one__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Single End-->

        <!--CTA One Start-->
        <?php $this->load->view("dev/partials/sectionapp.php")?>
        <!--CTA One End-->

        <!--Site Footer One Start-->
        <?php $this->load->view("dev/partials/footer.php")?>
        <!--Site Footer One End-->


    </div>
    <!-- /.page-wrapper -->


    <?php $this->load->view("dev/partials/mobilemenu.php")?>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <?php $this->load->view("dev/partials/js.php") ?>

</body>

</html>
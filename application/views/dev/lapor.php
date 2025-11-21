<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pelayanan Pengaduan - PPID Kab. Sumedang</title>
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
                        <li><a>Layanan Informasi</a></li>
                        <li><span>/</span></li>
                        <li><a href="#">Services</a></li>
                    </ul>
                    <h2>PROSEDUR PENGADUAN PELAYANAN PUBLIK</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Services Details Start-->
        <section class="services-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="services-details__left">
                            <div class="services-details__img">
                                <img src="<?= base_url();?>upload/lapor/Pengaduan Lapor.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="services-details__sidebar">
                            
                            <div class="services-details__help-box">
                                <div class="services-details__help-box-bg" style="background-image: url(<?= base_url()?>newestassets/images/services/services-details-need-help-bg.jpg)">
                                </div>
                                <a target = "__blank"href="https://lapor.go.id"  class="services-details__phone">ADUKAN SEKARANG!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services Details End-->

        <!--CTA One Start-->
        <?php $this->load->view('dev/partials/sectionapp.php')?>
        <!--CTA One End-->

        <!--Site Footer One Start-->
        <?php $this->load->view('dev/partials/footer.php')?>
        <!--Site Footer One End-->


    </div>
    <!-- /.page-wrapper -->


    <?php $this->load->view('dev/partials/mobilemenu')?>
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

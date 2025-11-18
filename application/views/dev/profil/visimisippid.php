<!DOCTYPE html>
<html lang="en">


<head>
    <title>Visi dan Misi Kab. Sumedang - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
</head>

<body>

    

    <!-- <div class="preloader">
        <div class="preloader__image"></div>
    </div> -->
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?php $this->load->view('dev/partials/header.php') ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <!--<div class="page-header__bg"></div>-->
            <!-- /.page-header__bg -->
            <div class="page-header-shape-1"></div>
            <!-- /.page-header-shape-1 -->
            <div class="page-header-shape-2"></div>
            <!-- /.page-header-shape-2 -->
            <div class="page-header-shape-3"></div>
            <!-- /.page-header-shape-3 -->
        </section>
        <!--Page Header End-->
        <section class="faqs-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_tittle text-center">
                            <h1>VISI & MISI PPID KABUPATEN SUMEDANG </h1>
                            <br>
                            <h3>Visi</h3>
                            <br>
                            <b>“Terwujudnya Pelayanan Informasi Yang Cepat dan Transparan Sesuai Dengan Ketentuan Perundang-Undangan Yang Berlaku”</b>
                            <br>
                            <br>
                            <h3>Misi</h3>
                        </div>
                        <p>1. Meningkatkan Kecepatan Respon erhadap Permohonan Informasi Publik;</p>
                        <p>2. Mewujudkan Keterbukaan Informasi Publik Pemerintah Kabupaten Sumedang;</p>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view("dev/partials/sectionapp.php") ?>

        <!--Site Footer One Start-->
        <?php $this->load->view("dev/partials/footer.php") ?>
        <!--Site Footer One End-->


    </div>
    <!-- /.page-wrapper -->


    <?php $this->load->view("dev/partials/mobilemenu.php") ?>
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


    <?php $this->load->view('dev/partials/js.php') ?>

</body>




</html>
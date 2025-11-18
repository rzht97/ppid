<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pengumuman</title>
    <?php $this->load->view('dev/partials/head.php') ?>
</head>

<body>

    

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
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
                    <!--<ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index-2.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Services</li>
                    </ul>-->
                    <h2>PENGUMUMAN</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="error-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="error-page__inner">
                            <!--<h2 class="error-page__title">PENGUMUMAN!</h2>-->
                            <h3 class="error-page__tagline">Permohonan Informasi untuk sementara belum bisa dilakukan melalui Website <br> dikarenakan dalam masa perbaikan</h3>
                            <p class="error-page__text">Untuk melakukan Permohonan Informasi silahkan mengirim e-mail : ppid@sumedangkab.go.id atau hubungi WA : 082240835844 (Achmad Safa R)</p>
                            
                            <a href="https://ppid.sumedangkab.go.id" class="thm-btn error-page__btn">Kembali Ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view("dev/partials/sectionapp.php")?>

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


    <?php $this->load->view('dev/partials/js.php') ?>

</body>


</html>
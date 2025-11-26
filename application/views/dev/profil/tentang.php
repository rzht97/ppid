<!DOCTYPE html>
<html lang="en">


<head>
    <title>Tentang PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <link href="<?= base_url() ?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

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
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="https://ppid.sumedangkab.go.id">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Tentang</li>
                    </ul>
                    <h2>GAMBARAN SINGKAT TENTANG PPID KAB. SUMEDANG</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        
        <!--About Start-->
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__img-box">
                            <div class="about-img">
                                <img src="https://ppid.sumedangkab.go.id/img/ppid/ppidlogo2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__right" style = "text-align:justify;">
                            <h2 class="about__title">PPID Kab. Sumedang</h2>
                            <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) Kabupaten Sumedang merupakan lembaga yang dibentuk untuk menjalankan amanat Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. PPID bertugas mengelola, mendokumentasikan, serta menyediakan informasi publik yang akurat, cepat, dan mudah diakses oleh masyarakat.</p>
                            <p>Sebagai ujung tombak keterbukaan informasi di lingkungan Pemerintah Kabupaten Sumedang, PPID memiliki peran strategis dalam mendorong terwujudnya tata kelola pemerintahan yang transparan, partisipatif, dan akuntabel. Melalui pelayanan informasi publik yang profesional, PPID berkomitmen untuk memberikan layanan prima kepada seluruh pemangku kepentingan, baik secara langsung maupun melalui media daring.</p>
                            <p>PPID Kabupaten Sumedang terus berinovasi dengan pemanfaatan teknologi informasi dalam menyediakan layanan informasi publik yang responsif dan mudah diakses. Hal ini sejalan dengan visi Kabupaten Sumedang sebagai Smart City yang berbasis digital dan pelayanan publik yang berorientasi pada kebutuhan masyarakat.</p>
                            <p>Dengan adanya PPID, masyarakat memiliki hak yang lebih besar untuk mengetahui, memahami, serta mengawasi jalannya pemerintahan di Kabupaten Sumedang demi terwujudnya pemerintahan yang terbuka dan terpercaya.</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About End-->

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

    <script src="<?= base_url() ?>inverse/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>inverse/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>inverse/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>inverse/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>inverse/js/custom.min.js"></script>
    <script src="<?= base_url() ?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    
    <!--Style Switcher -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


</html>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Regulasi - PPID Kab. Sumedang</title>
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
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Informasi Publik</li>
                    </ul>
                    <h2>REGULASI INFORMASI</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="faqs-page">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="feature_img">
                            <img src="https://ppid.sumedangkab.go.id/img/ppid/ppidlogo2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="feature_part_text">
                            <h2><b>Regulasi Informasi Publik</b></h2>
                            <p>Dasar Hukum dari Pelaksanaan PPID Kabupaten Sumedang adalah :</p>
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <tbody>

                                        <tr>
                                            <td width="20">
                                                1
                                            </td>

                                            <td width="350">
                                                Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
                                            </td>

                                            <td width="30"><a target="_blank" href="https://ppid.sumedangkab.go.id/upload/regulasi/uu14th2008.pdf">download</a></td>
                                        </tr>


                                        <tr>
                                            <td width="20">
                                                2
                                            </td>

                                            <td width="350">
                                                Peraturan Pemerintah Nomor 61 tahun 2010 tentang Pelaksanaan Undang-Undang Nomor 14 tahun 2008 tentang Keterbukaan Informasi Publik.
                                            </td>

                                            <td width="30"><a target = "_blank" href="https://ppid.sumedangkab.go.id/upload/regulasi/pp61th2010.pdf">download</a></td>
                                        </tr>

										<tr>
                                            <td width="20">
                                                3
                                            </td>

                                            <td width="350">
                                                Peraturan Komisi Informasi Pusat Nomor 1 Tahun 2021 tentang Standar Layanan Informasi Publik.
                                            </td>

                                            <td width="30"><a target = " _blank" href="https://ppid.sumedangkab.go.id/upload/regulasi/Perki1th2021.pdf">download</a></td>
                                        </tr>
										
                                        <tr>
                                            <td width="20">
                                                4
                                            </td>

                                            <td width="350">
                                                PERATURAN BUPATI SUMEDANG NOMOR 144 TAHUN 2021 TENTANG PENGELOLAAN PELAYANAN INFORMASI DAN DOKUMENTASI PEMERINTAHAN DAERAH
                                            </td>

                                            <td width="30"> <a target = "_blank" href="http://ppid.sumedangkab.go.id/upload/regulasi/Perbup144.pdf">download</a></td>
                                        </tr>
										
										<tr>
                                            <td width="20">
                                                4
                                            </td>

                                            <td width="350">
                                                KEPUTUSAN BUPATI SUMEDANG NOMOR 68 TAHUN 2022 TENTANG SUSUNAN PENGELOLAAN INFORMASI DAN DOKUMENTASI PADA PEMERINTAH KABUPATEN SUMEDANG
                                            </td>

                                            <td width="30"> <a target = "_blank" href="https://ppid.sumedangkab.go.id/upload/regulasi/kepbup68.pdf">download</a></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
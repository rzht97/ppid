<!DOCTYPE html>
<html lang="en">


<head>
    <title>Tugas dan Wewenang - PPID Kab. Sumedang</title>
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
                        <li>Profil</li>
                    </ul>
                    <h2>URAIAN TUGAS</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="faqs-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_tittle text-center">
                            <h1>TUGAS DAN WEWENANG PPID KABUPATEN SUMEDANG </h1>
                            <hr>
							<br>
                            <h3>Tugas</h3>
                            <br>
                        </div>
                        <p>1. Menyusun dan melaksanakan kebijakan Informasi dan
Dokumentasi</p>
                        <p>2. Menyusun laporan pelaksanaan kebijakan Informasi dan
Dokumentasi</p>
                        <p>3. Mengoordinasikan dan mengonsolidasikan pengumpulan
bahan Informasi dan Dokumentasi dari PPID Pembantu;</p>
                        <p>4. Menyimpan, mendokumentasikan, menyediakan, dan
memberi pelayanan Informasi dan Dokumentasi kepada
publik;</p>
                        <p>6. Melakukan uji konsekuensi atas Informasi dan
Dokumentasi yang dikecualikan</p>
						<p>7. Melakukan pemutakhiran Informasi dan Dokumentasi</p>
						<p>8. Menyediakan Informasi dan Dokumentasi untuk diakses
oleh masyarakat</p>
						<p>9. Melakukan pembinaan, pengawasan, evaluasi, dan
monitoring atas pelaksanaan kebijakan Informasi dan
Dokumentasi yang dilakukan oleh PPID Pembantu;</p>
						<p>10. Melaksanakan rapat koordinasi dan rapat kerja secara
berkala dan/atau sesuai dengan kebutuhan;</p>
						<p>11. Mengesahkan Informasi dan Dokumentasi yang layak
untuk dipublikasikan;</p>
						<p>12. Menugaskan PPID Pembantu dan/atau Pejabat
Fungsional untuk mengumpulkan, mengelola, dan
memelihara Informasi dan Dokumentasi</p>
						<p>13. Membentuk tim fasilitasi penanganan sengketa Informasi
yang ditetapkan dengan Keputusan Bupati</p>
						<div class="section_tittle text-center">
							<br>
                            <h3>Wewenang</h3>
                            <br>
                        </div>
						<p>1. menolak memberikan Informasi dan Dokumentasi yang
dikecualikan sesuai dengan ketentuan peraturan
perundang-undangan</p>
						<p>2. meminta dan memperoleh Informasi dan Dokumentasi
dari PPID Pembantu yang menjadi cakupan kerjanya</p>
						<p>3. mengoordinasikan pemberian pelayanan Informasi dan
Dokumentasi dengan PPID Pembantu yang menjadi
cakupan kerjanya</p>
						<p>4. menentukan atau menetapkan suatu Informasi dan
Dokumentasi yang dapat diakses oleh publik</p>
						<p>5. menugaskan PPID Pembantu dan/atau Pejabat
Fungsional untuk membuat, mengumpulkan, serta
memelihara Informasi dan Dokumentasi untuk
kebutuhan organisasi.</p>
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
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Tugas dan Wewenang - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <style>
        .urtug-section { padding: 60px 0; background: #f8f9fa; }
        .section-card { background: #fff; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); padding: 35px; margin-bottom: 30px; }
        .section-title-custom { font-size: 22px; font-weight: 600; color: #333; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 3px solid var(--thm-primary, #0d6efd); }
        .section-title-custom i { margin-right: 10px; color: var(--thm-primary, #0d6efd); }
        .tugas-list { list-style: none; padding: 0; margin: 0; }
        .tugas-list li { display: flex; align-items: flex-start; padding: 15px 0; border-bottom: 1px solid #e9ecef; }
        .tugas-list li:last-child { border-bottom: none; }
        .tugas-number { min-width: 36px; height: 36px; background: linear-gradient(135deg, var(--thm-primary, #0d6efd) 0%, #0056b3 100%); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; margin-right: 15px; flex-shrink: 0; }
        .wewenang-number { min-width: 36px; height: 36px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; margin-right: 15px; flex-shrink: 0; }
        .tugas-text { font-size: 15px; line-height: 1.7; color: #555; }
        @media (max-width: 768px) {
            .urtug-section { padding: 30px 0; }
            .section-card { padding: 20px; }
            .tugas-list li { padding: 12px 0; }
        }
    </style>
</head>

<body>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>

    <div class="page-wrapper">
        <?php $this->load->view('dev/partials/header.php') ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"></div>
            <div class="page-header-shape-1"></div>
            <div class="page-header-shape-2"></div>
            <div class="page-header-shape-3"></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Profil</li>
                    </ul>
                    <h2>TUGAS & WEWENANG</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="urtug-section">
            <div class="container">
                <!-- Tugas -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-tasks"></i> Tugas PPID Kabupaten Sumedang</h3>
                    <ul class="tugas-list">
                        <li>
                            <span class="tugas-number">1</span>
                            <span class="tugas-text">Menyusun dan melaksanakan kebijakan Informasi dan Dokumentasi</span>
                        </li>
                        <li>
                            <span class="tugas-number">2</span>
                            <span class="tugas-text">Menyusun laporan pelaksanaan kebijakan Informasi dan Dokumentasi</span>
                        </li>
                        <li>
                            <span class="tugas-number">3</span>
                            <span class="tugas-text">Mengoordinasikan dan mengonsolidasikan pengumpulan bahan Informasi dan Dokumentasi dari PPID Pembantu</span>
                        </li>
                        <li>
                            <span class="tugas-number">4</span>
                            <span class="tugas-text">Menyimpan, mendokumentasikan, menyediakan, dan memberi pelayanan Informasi dan Dokumentasi kepada publik</span>
                        </li>
                        <li>
                            <span class="tugas-number">5</span>
                            <span class="tugas-text">Melakukan verifikasi bahan Informasi dan Dokumentasi dari PPID Pembantu</span>
                        </li>
                        <li>
                            <span class="tugas-number">6</span>
                            <span class="tugas-text">Melakukan uji konsekuensi atas Informasi dan Dokumentasi yang dikecualikan</span>
                        </li>
                        <li>
                            <span class="tugas-number">7</span>
                            <span class="tugas-text">Melakukan pemutakhiran Informasi dan Dokumentasi</span>
                        </li>
                        <li>
                            <span class="tugas-number">8</span>
                            <span class="tugas-text">Menyediakan Informasi dan Dokumentasi untuk diakses oleh masyarakat</span>
                        </li>
                        <li>
                            <span class="tugas-number">9</span>
                            <span class="tugas-text">Melakukan pembinaan, pengawasan, evaluasi, dan monitoring atas pelaksanaan kebijakan Informasi dan Dokumentasi yang dilakukan oleh PPID Pembantu</span>
                        </li>
                        <li>
                            <span class="tugas-number">10</span>
                            <span class="tugas-text">Melaksanakan rapat koordinasi dan rapat kerja secara berkala dan/atau sesuai dengan kebutuhan</span>
                        </li>
                        <li>
                            <span class="tugas-number">11</span>
                            <span class="tugas-text">Mengesahkan Informasi dan Dokumentasi yang layak untuk dipublikasikan</span>
                        </li>
                        <li>
                            <span class="tugas-number">12</span>
                            <span class="tugas-text">Menugaskan PPID Pembantu dan/atau Pejabat Fungsional untuk mengumpulkan, mengelola, dan memelihara Informasi dan Dokumentasi</span>
                        </li>
                        <li>
                            <span class="tugas-number">13</span>
                            <span class="tugas-text">Membentuk tim fasilitasi penanganan sengketa Informasi yang ditetapkan dengan Keputusan Bupati</span>
                        </li>
                    </ul>
                </div>

                <!-- Wewenang -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-gavel"></i> Wewenang PPID Kabupaten Sumedang</h3>
                    <ul class="tugas-list">
                        <li>
                            <span class="wewenang-number">1</span>
                            <span class="tugas-text">Menolak memberikan Informasi dan Dokumentasi yang dikecualikan sesuai dengan ketentuan peraturan perundang-undangan</span>
                        </li>
                        <li>
                            <span class="wewenang-number">2</span>
                            <span class="tugas-text">Meminta dan memperoleh Informasi dan Dokumentasi dari PPID Pembantu yang menjadi cakupan kerjanya</span>
                        </li>
                        <li>
                            <span class="wewenang-number">3</span>
                            <span class="tugas-text">Mengoordinasikan pemberian pelayanan Informasi dan Dokumentasi dengan PPID Pembantu yang menjadi cakupan kerjanya</span>
                        </li>
                        <li>
                            <span class="wewenang-number">4</span>
                            <span class="tugas-text">Menentukan atau menetapkan suatu Informasi dan Dokumentasi yang dapat diakses oleh publik</span>
                        </li>
                        <li>
                            <span class="wewenang-number">5</span>
                            <span class="tugas-text">Menugaskan PPID Pembantu dan/atau Pejabat Fungsional untuk membuat, mengumpulkan, serta memelihara Informasi dan Dokumentasi untuk kebutuhan organisasi</span>
                        </li>
                    </ul>
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

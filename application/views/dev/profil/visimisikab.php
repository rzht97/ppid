<!DOCTYPE html>
<html lang="en">


<head>
    <title>Visi dan Misi Kab. Sumedang - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <style>
        .visimisi-section { padding: 60px 0; background: #f8f9fa; }
        .section-card { background: #fff; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); padding: 35px; margin-bottom: 30px; }
        .section-title-custom { font-size: 22px; font-weight: 600; color: #333; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 3px solid var(--thm-primary, #0d6efd); }
        .section-title-custom i { margin-right: 10px; color: var(--thm-primary, #0d6efd); }
        .visi-box { background: linear-gradient(135deg, var(--thm-primary, #0d6efd) 0%, #0056b3 100%); color: #fff; padding: 30px; border-radius: 10px; text-align: center; margin-bottom: 20px; }
        .visi-box h4 { font-size: 18px; margin-bottom: 15px; opacity: 0.9; }
        .visi-box p { font-size: 18px; font-weight: 500; line-height: 1.6; margin: 0; }
        .misi-list { list-style: none; padding: 0; margin: 0; counter-reset: misi-counter; }
        .misi-list li { display: flex; align-items: flex-start; padding: 18px 0; border-bottom: 1px solid #e9ecef; counter-increment: misi-counter; }
        .misi-list li:last-child { border-bottom: none; }
        .misi-number { min-width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; margin-right: 15px; flex-shrink: 0; }
        .misi-text { font-size: 15px; line-height: 1.7; color: #555; }
        @media (max-width: 768px) {
            .visimisi-section { padding: 30px 0; }
            .section-card { padding: 20px; }
            .visi-box { padding: 20px; }
            .visi-box p { font-size: 16px; }
            .misi-list li { padding: 15px 0; }
        }
    </style>
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
                    <h2>VISI & MISI KABUPATEN</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="visimisi-section">
            <div class="container">
                <!-- Visi -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-eye"></i> Visi Kabupaten Sumedang</h3>
                    <div class="visi-box">
                        <p>"Sumedang SIMPATI (Sejahtera, Agamis, Maju, Profesional, dan Kreatif)" Semakin Maju Menuju Indonesia Emas 2045</p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-bullseye"></i> Misi Kabupaten Sumedang</h3>
                    <ul class="misi-list">
                        <li>
                            <span class="misi-number">1</span>
                            <span class="misi-text">Mewujudkan nilai-nilai religius, taat hukum dan demokratis untuk menciptakan generasi emas yang produktif, unggul dan maju</span>
                        </li>
                        <li>
                            <span class="misi-number">2</span>
                            <span class="misi-text">Meningkatkan kualitas kinerja aparatur melalui penguatan tata kelola pemerintahan yang jujur, akuntabel, bebas korupsi dan inovatif berbasis teknologi digital</span>
                        </li>
                        <li>
                            <span class="misi-number">3</span>
                            <span class="misi-text">Mempercepat pembangunan infrastruktur layanan dasar, pengembangan wilayah dan pembangunan kawasan industri guna meningkatkan pertumbuhan ekonomi</span>
                        </li>
                        <li>
                            <span class="misi-number">4</span>
                            <span class="misi-text">Memperluas kesempatan kerja dan penambahan keterampilan bagi generasi muda untuk mengatasi pengangguran dan pengentasan kemiskinan</span>
                        </li>
                        <li>
                            <span class="misi-number">5</span>
                            <span class="misi-text">Meningkatkan produktifitas pertanian, merevitalisasi irigasi, mendukung mekanisasi alat mesin pertanian dan sarana produksi pertanian, serta mengimplementasikan reforma agraria guna mewujudkan ketahanan pangan dan kesejahteraan petani</span>
                        </li>
                        <li>
                            <span class="misi-number">6</span>
                            <span class="misi-text">Mempercepat pembangunan sektor industri dan perdagangan guna meningkatkan pendapatan pelaku usaha terutama UMKM, melalui revitalisasi pasar tradisional, pembangunan pasar induk, fasilitasi bantuan teknologi produksi dan pemasaran serta permodalan</span>
                        </li>
                        <li>
                            <span class="misi-number">7</span>
                            <span class="misi-text">Peningkatan bantuan keuangan desa yang merata serta mengoptimalkan insentif bagi RT/RW, PKK, BPD, Guru Ngaji, Guru Honorer, Guru PAUD, Da'i/Da'iyah, Kader Posyandu, Linmas, bantuan pesantren dan masjid serta apresiasi yang berprestasi</span>
                        </li>
                        <li>
                            <span class="misi-number">8</span>
                            <span class="misi-text">Meningkatkan efektivitas program inklusif pemberdayaan perempuan, perlindungan anak, ibu hamil dan mendorong terbentuknya pelayanan lansia (Geriatri), serta aksesibilitas bagi penyandang disabilitas</span>
                        </li>
                        <li>
                            <span class="misi-number">9</span>
                            <span class="misi-text">Memperkuat peran pelaku seni budaya, kelompok kreatif dan komunitas seni tradisi serta mendorong pengembangan sektor pariwisata berbasis kekayaan alam dan kebudayaan dalam rangka implementasi SPBS (Sumedang Puseur Budaya Sunda)</span>
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
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Visi dan Misi PPID - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <style>
        .visimisi-section { padding: 60px 0; background: #f8f9fa; }
        .section-card { background: #fff; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); padding: 35px; margin-bottom: 30px; }
        .section-title-custom { font-size: 22px; font-weight: 600; color: #333; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 3px solid var(--thm-primary, #0d6efd); }
        .section-title-custom i { margin-right: 10px; color: var(--thm-primary, #0d6efd); }
        .visi-box { background: linear-gradient(135deg, var(--thm-primary, #0d6efd) 0%, #0056b3 100%); color: #fff; padding: 30px; border-radius: 10px; text-align: center; }
        .visi-box p { font-size: 18px; font-weight: 500; line-height: 1.6; margin: 0; }
        .misi-list { list-style: none; padding: 0; margin: 0; }
        .misi-list li { display: flex; align-items: flex-start; padding: 18px 0; border-bottom: 1px solid #e9ecef; }
        .misi-list li:last-child { border-bottom: none; }
        .misi-number { min-width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; margin-right: 15px; flex-shrink: 0; }
        .misi-text { font-size: 15px; line-height: 1.7; color: #555; }
        @media (max-width: 768px) {
            .visimisi-section { padding: 30px 0; }
            .section-card { padding: 20px; }
            .visi-box { padding: 20px; }
            .visi-box p { font-size: 16px; }
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
                    <h2>VISI & MISI PPID</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="visimisi-section">
            <div class="container">
                <!-- Visi -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-eye"></i> Visi PPID Kabupaten Sumedang</h3>
                    <div class="visi-box">
                        <p>"Terwujudnya Pelayanan Informasi Yang Cepat dan Transparan Sesuai Dengan Ketentuan Perundang-Undangan Yang Berlaku"</p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-bullseye"></i> Misi PPID Kabupaten Sumedang</h3>
                    <ul class="misi-list">
                        <li>
                            <span class="misi-number">1</span>
                            <span class="misi-text">Meningkatkan Kecepatan Respon terhadap Permohonan Informasi Publik</span>
                        </li>
                        <li>
                            <span class="misi-number">2</span>
                            <span class="misi-text">Mewujudkan Keterbukaan Informasi Publik Pemerintah Kabupaten Sumedang</span>
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
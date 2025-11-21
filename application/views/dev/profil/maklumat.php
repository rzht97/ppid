<!DOCTYPE html>
<html lang="en">


<head>
    <title>Maklumat Pelayanan - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <style>
        .maklumat-section { padding: 60px 0; background: #f8f9fa; }
        .section-card { background: #fff; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); padding: 35px; margin-bottom: 30px; }
        .section-title-custom { font-size: 22px; font-weight: 600; color: #333; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 3px solid var(--thm-primary, #0d6efd); }
        .section-title-custom i { margin-right: 10px; color: var(--thm-primary, #0d6efd); }
        .intro-box { background: linear-gradient(135deg, var(--thm-primary, #0d6efd) 0%, #0056b3 100%); color: #fff; padding: 25px 30px; border-radius: 10px; margin-bottom: 25px; }
        .intro-box p { font-size: 16px; font-weight: 500; line-height: 1.6; margin: 0; }
        .maklumat-list { list-style: none; padding: 0; margin: 0; }
        .maklumat-list li { display: flex; align-items: flex-start; padding: 15px 0; border-bottom: 1px solid #e9ecef; }
        .maklumat-list li:last-child { border-bottom: none; }
        .maklumat-number { min-width: 36px; height: 36px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; margin-right: 15px; flex-shrink: 0; }
        .maklumat-text { font-size: 15px; line-height: 1.7; color: #555; }
        @media (max-width: 768px) {
            .maklumat-section { padding: 30px 0; }
            .section-card { padding: 20px; }
            .intro-box { padding: 20px; }
            .maklumat-list li { padding: 12px 0; }
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
                    <h2>MAKLUMAT PELAYANAN</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="maklumat-section">
            <div class="container">
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-certificate"></i> Maklumat Pelayanan PPID Kabupaten Sumedang</h3>
                    <div class="intro-box">
                        <p>PPID Utama Kabupaten Sumedang berupaya memberikan pelayanan informasi publik dan berkomitmen untuk:</p>
                    </div>
                    <ul class="maklumat-list">
                        <li>
                            <span class="maklumat-number">1</span>
                            <span class="maklumat-text">Memberikan pelayanan informasi yang prima berdasarkan Undang-Undang No 14 Tahun 2008 tentang Keterbukaan Informasi Publik dan juga turut mewujudkan misi Pemerintah Kabupaten Sumedang yang berorientasi pada pelayanan publik</span>
                        </li>
                        <li>
                            <span class="maklumat-number">2</span>
                            <span class="maklumat-text">Memberikan kemudahan kepada publik dalam mendapatkan informasi yang diperlukan dengan murah dan sederhana</span>
                        </li>
                        <li>
                            <span class="maklumat-number">3</span>
                            <span class="maklumat-text">Menyediakan dan memberikan informasi publik yang dikuasai secara akurat, benar dan tidak menyesatkan</span>
                        </li>
                        <li>
                            <span class="maklumat-number">4</span>
                            <span class="maklumat-text">Menyediakan daftar informasi publik untuk informasi yang wajib disediakan dan diumumkan</span>
                        </li>
                        <li>
                            <span class="maklumat-number">5</span>
                            <span class="maklumat-text">Bertindak proaktif dalam memenuhi kebutuhan informasi masyarakat serta menjamin seluruh informasi publik dan fasilitas pelayanan sesuai dengan ketentuan yang berlaku</span>
                        </li>
                        <li>
                            <span class="maklumat-number">6</span>
                            <span class="maklumat-text">Menyiapkan ruang dan fasilitas yang nyaman dan tertata baik</span>
                        </li>
                        <li>
                            <span class="maklumat-number">7</span>
                            <span class="maklumat-text">Bersikap adil, tidak diskriminatif dan berperilaku sopan santun dalam memberikan layanan informasi publik</span>
                        </li>
                        <li>
                            <span class="maklumat-number">8</span>
                            <span class="maklumat-text">Menyiapkan petugas informasi yang berdedikasi dan siap melayani</span>
                        </li>
                        <li>
                            <span class="maklumat-number">9</span>
                            <span class="maklumat-text">Tidak melakukan pungutan biaya yang tidak sesuai dengan ketentuan peraturan perundangan dalam memberikan layanan informasi publik</span>
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

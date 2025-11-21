<html lang="en">



<head>
    <title>PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>
</head>

<body>

    
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?php $this->load->view("dev/partials/header.php") ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->


        <section class="main-slider main-slider-two">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
            },
            "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
                "delay": 5000
            }}'>
                <div class="swiper-wrapper">


                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(<?= base_url() ?>upload/family-freeze.png);" width="1894" height="970">
                        </div>
                        <div class="image-layer-overlay"></div>
                        <!--<div class="main-slider-two-shape-1" style="background-image: url(<?= base_url() ?>newestassets/images/shapes/main-slider--two-shape-1.png)"></div>-->
                        <!--<div class="main-slider-two-shape-2"></div>-->
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-slider__content text-center">
                                        <!-- <h2>Finance <span class="main-slider-two__single-text">&</span> <br> Consulting
                                        </h2> -->
                                        <h2>Selamat Datang</h2>
                                        <p>di PPID Kab. Sumedang</p>
                                        <a href="<?php echo site_url('publicpermohonan')?>" class="thm-btn">Mulai Memohon Informasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(<?= base_url() ?>newestassets/images/lapor.png);">
                        </div>
                        <div class="image-layer-overlay"></div>
                        <!--<div class="main-slider-two-shape-1" style="background-image: url(<?= base_url() ?>newestassets/images/shapes/main-slider--two-shape-1.png)"></div>-->
                        <!--<div class="main-slider-two-shape-2"></div>-->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-slider__content text-center">
                                        <!-- <h2>Finance <span class="main-slider-two__single-text">&</span> <br> Consulting
                                        </h2> -->
                                        <h2>Pengelolaan Pengaduan Pelayanan Publik</h2>
                                        <p>Sampaikan Laporan Anda Langsung Kepada Instansi Pemerintah Kabupaten Sumedang</p>
                                        <a target="_blank" href="https://lapor.go.id" class="thm-btn">Adukan Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="main-slider__nav main-slider-two__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><span class="main-slider__next-text">Next</span><i class="icon-right-arrow icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><span class="main-slider__prev-text">Prev</span><i class="icon-right-arrow"></i>
                    </div>
                </div>
            </div>
        </section>

        <!--Industries Start-->
        <section class="industries">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center">
                            <h2 class="section-title__title">Klasifikasi Informasi Publik</h2>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled industries__content-box">
                    <div class="row">
                        <div class="col-md-3">
                            <li class="industries__single wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="industries__icon">
                                    <span class="icon-bank"></span>
                                </div>
                                <h3 class="industries__title"><a href="<?php echo site_url('infoberkala')?>"> Berkala</a></h3>
                                <p class="industries__text">informasi yang wajib diperbaharui kemudian disediakan dan diumumkan kepada publik secara berkala</p>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="industries__single wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="industries__icon">
                                    <span class="icon-protection"></span>
                                </div>
                                <h3 class="industries__title"><a href="<?php echo site_url('infosetiapsaat')?>">Setiap Saat</a></h3>
                                <p class="industries__text">informasi yang harus disediakan oleh Badan Publik dan siap tersedia untuk Pemohon Informasi</p>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="industries__single wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="industries__icon">
                                    <span class="icon-travel"></span>
                                </div>
                                <h3 class="industries__title"><a href="<?php echo site_url('infosertamerta')?>">Serta Merta</a></h3>
                                <p class="industries__text">informasi yang berkaitan dengan hajat hidup orang banyak dan wajib diumumkan tanpa penundaan.</p>
                            </li>
                        </div>
						<div class="col-md-3">
                            <li class="industries__single wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="industries__icon">
                                    <span class="icon-research"></span>
                                </div>
                                <h3 class="industries__title"><a href="<?php echo site_url('dik')?>">Dikecualikan</a></h3>
                                <p class="industries__text">informasi yang tidak dapat diakses oleh pemohon informasi publik.</p>
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
        </section>
        <!--Industries End-->

        <!--Services One Start-->
        <section class="services-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="services-two__top-left">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">Layanan Informasi</h2>
                                <!--<span class="section-title__tagline">We're here to help during market volatility</span>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <!--Services Two Single-->
                        <div class="services-two__single">
                            <div class="services-two__icon">
                                <span class="icon-creative-1"></span>
                            </div>
                            <h3 class="services-two__title"><a href="<?php echo site_url('caradapatinfo')?>">Cara Mendapatkan Informasi</a>
                            </h3>
                            <!-- <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p> -->
                            <a href="<?php echo site_url('caradapatinfo')?>" class="services-two__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <!--Services Two Single-->
                        <div class="services-two__single">
                            <div class="services-two__icon">
                                <span class="icon-analysis"></span>
                            </div>
                            <h3 class="services-two__title"><a href="<?php echo site_url('carakeberatan')?>">Tata Cara Pengajuan Keberatan</a>
                            </h3>
                            <!-- <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p> -->
                            <a href="<?php echo site_url('carakeberatan')?>" class="services-two__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <!--Services Two Single-->
                        <div class="services-two__single">
                            <div class="services-two__icon">
                                <span class="icon-business"></span>
                            </div>
                            <h6 class="services-two__title"><a href="<?php echo site_url('carasengketa')?>">Penanganan Sengketa Informasi</a>
                            </h6>
                            <!-- <p class="services-two__text">Lorem ipsum is are many variations of pass of majority.</p> -->
                            <a href="<?php echo site_url('carasengketa')?>" class="services-two__arrow">
                                <span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--Services One End-->
		
        <!--Counters One Start-->
        <section class="counters-one">
            <div class="counters-one-bg" style="background-image: url(<?= base_url() ?>newestassets/images/backgrounds/counter-one-bg.jpg)">
            </div>
            <div class="container">
                <ul class="counters-one__box list-unstyled">
                    <div class="row">
                        <div class="col-md-3">
                            <li class="counter-one__single">
                                <div class="counter-one__icon">
                                    <span class="icon-customer-review"></span>
                                </div>
                                <h3 class="odometer" data-count="<?php foreach($jml as $jml):?>
										<?php echo $jml->total?>
									<?php endforeach;?>"></h3>
                                <p class="counter-one__text">Jumlah Permohonan</p>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="counter-one__single">
                                <div class="counter-one__icon">
                                    <span class="icon-video"></span>
                                </div>
                                <h3 class="odometer" data-count="<?php foreach($selesai as $selesai):?>
										<?php echo $selesai->total?>
									<?php endforeach;?>"></h3>
                                <p class="counter-one__text">Selesai</p>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="counter-one__single">
                                <div class="counter-one__icon">
                                    <span class="icon-help"></span>
                                </div>
								<h3 class="odometer" data-count="<?php foreach($ditolak as $ditolak):?>
										<?php echo $ditolak->total?>
									<?php endforeach;?>"></h3>
                                <p class="counter-one__text">Ditolak</p>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <li class="counter-one__single">
                                <div class="counter-one__icon">
                                    <span class="icon-consultant"></span>
                                </div>
                                <?php foreach ($ditolak as $ditolak) : ?>
                                    <h3 class="odometer" data-count="00">00</h3>
                                    <p class="counter-one__text">Sengketa</p>
                                <?php endforeach; ?>
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
        </section>
        <!--Counters One Start-->

        <!--News One Start-->
        <?php if (!empty($berita)): ?>
        <section class="news-one" style="background-color: #f8f9fa;">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="section-title__title">Berita PPID</h2>
                </div>
                <div class="row">
                    <?php
                    $delays = ['0ms', '300ms', '600ms'];
                    $i = 0;
                    foreach($berita as $item):
                    ?>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="<?= $delays[$i % 3] ?>" data-wow-duration="1500ms">
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src="<?= htmlspecialchars($item['picture']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                                <a href="<?= site_url('berita/detail/' . htmlspecialchars($item['title_slug'])) ?>">
                                    <span class="news-one__plus"></span>
                                </a>
                            </div>
                            <div class="news-one__content" style="margin-top: 0; margin-left: 0;">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="#"><i class="far fa-user-circle"></i> <?= htmlspecialchars($item['author']['full_name'] ?? 'Admin') ?></a></li>
                                </ul>
                                <h3 class="news-one__title">
                                    <a href="<?= site_url('berita/detail/' . htmlspecialchars($item['title_slug'])) ?>"><?= htmlspecialchars($item['title']) ?></a>
                                </h3>
                                <a href="<?= site_url('berita/detail/' . htmlspecialchars($item['title_slug'])) ?>" class="news-one__btn">Baca Selengkapnya</a>
                                <div class="news-one__date-box">
                                    <p><?= date('d M', strtotime($item['publish_date'])) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <!--News One End-->

        <!--CTA Two Start-->
        <?php $this->load->view("dev/partials/sectionapp.php") ?>
        <!--CTA Two End-->

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


    <?php $this->load->view("dev/partials/js.php") ?>

</body>


</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Berita PPID - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>
</head>

<body>
    <div class="preloader">
        <div class="preloader__image"></div>
        <!-- /.preloader__image -->
    </div>

    <!--<div id="news-data">
        <?php if (isset($news['error'])): ?>
            <p><?= htmlspecialchars($news['error']) ?></p>
        <?php else: ?>
            <ul>
                <?php foreach ($news as $item): ?>
                    <li>
                        <h2><?= htmlspecialchars($item['title']) ?></h2>
                        <p><strong>Penulis:</strong> <?= htmlspecialchars($item['author']['full_name'] ?? 'Tidak Diketahui') ?></p>
                        <p><?= htmlspecialchars($item['content']) ?></p>
                        <img src="<?= htmlspecialchars($item['picture']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                        <p><a href="<?= htmlspecialchars($item['hyperlink']) ?>" target="_blank">Baca Selengkapnya</a></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>-->

    <div class="page-wrapper">
        <?php $this->load->view("dev/partials/header.php") ?>

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
                        <li><a href="index-2.html">Beranda</a></li>
                        <li><span>/</span></li>
                        <li><a>Berita</a></li>
                    </ul>
                    <h2>BERITA PPID</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Single Start-->
        <section class="blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-gl-7">
                        <div id="news-data">
                            <?php if (isset($news['error'])): ?>
                                <p><?= htmlspecialchars($news['error']) ?></p>
                            <?php else: ?>
                                <?php foreach ($news as $item) : ?>
                                    <div class="blog-single__left">
                                        <div class="blog-single__content">

                                            <div class="blog-single__content-single">
                                                <div class="blog-single__content-img">
                                                    <img src="<?= htmlspecialchars($item['picture']) ?>" alt="" width="50%" height="40%">
                                                    <div class="blog-single__date-box">
                                                        <p><?= htmlspecialchars($item['publish_date']) ?></p>
                                                    </div>
                                                </div>
                                                <div class="blog-single__content-box">
                                                    <ul class="list-unstyled blog-single__meta">
                                                        <li><i class="far fa-user-circle"></i><?= htmlspecialchars($item['author']['full_name'] ?? 'Tidak Diketahui') ?></li>
                                                        <li><span>/</span></li>
                                                        <li><a href="#"><i class="far fa-comments"></i> <?= htmlspecialchars($item['hits']) ?> Dilihat</a>
                                                        </li>
                                                    </ul>
                                                    <h3 class="blog-single__title">
                                                        <h2><?= htmlspecialchars($item['title']) ?></h2>
                                                        <!--<a href="blog-details.html"><?= htmlspecialchars($item['Title']) ?></a>-->
														<a href="<?php echo site_url('berita/detail/'.htmlspecialchars($item['title_slug']))?>" class="blog-single__btn">Read More</a>
                                                    </h3>
                                                    <hr style="border: 1px solid black;">
                                                    <!-- <p class="blog-single__text"><?= htmlspecialchars($item['content']) ?></p>-->

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5">
                    	<div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <form action="#" class="sidebar__search-form">
                                    <input type="search" placeholder="Search here">
                                    <button type="submit"><i class="icon-magnifying-glass"></i></button>
                                </form>
                            </div>
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Berita Terpopuler</h3>
                                <div id="news-data">
                            <?php if (isset($news2['error'])): ?>
                                <p><?= htmlspecialchars($news2['error']) ?></p>
                            <?php else: ?>
                                <?php foreach ($news2 as $item2) : ?>
								<ul class="sidebar__post-list list-unstyled">
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="<?= htmlspecialchars($item2['picture']) ?>" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="#" class="sidebar__post-content_meta"><i
                                                        class="far fa-comments"></i><?= htmlspecialchars($item2['hits']) ?> Dilihat</a>
                                                <a href="<?php echo site_url('berita/detail/'.htmlspecialchars($item['title_slug']))?>"><?= htmlspecialchars($item2['title']) ?></a>
                                            </h3>
                                        </div>
                                    </li>
                                </ul>
								<?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                            </div>
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">Layanan Informasi</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    <ul class="services-details__services-list list-unstyled">
                                    <li><a href="<?php echo site_url('dev/overview/caradapatinfo')?>">Tata Cara Mendapatkan Informasi <span class="icon-right-arrow"></span></a></li>
                                    <li><a href="<?php echo site_url('dev/overview/carakeberatan')?>">Tata Cara Pengajuan Keberatan<span class="icon-right-arrow"></span></a></li>
                                    <li><a href="<?php echo site_url('dev/overview/sengketa')?>">Prosedur Penanganan Sengketa Informasi<span class="icon-right-arrow"></span></a></li>
                                </ul>
                                </ul>
                            </div>
                        </div>   
                	</div>
            </div>
    </div>
    </section>
    <!--Blog Single End-->

    <!--CTA One Start-->
    <?php $this->load->view("dev/partials/sectionapp.php") ?>
    <!--CTA One End-->

    <!--Site Footer One Start-->
    <?php $this->load->view("dev/partials/footer.php") ?>
    <!--Site Footer One End-->
    </div>
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
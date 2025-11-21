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
    <!-- /.preloader -->
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
        <section class="news-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div id="news-data">
                            <?php if (isset($news['error'])): ?>
                                <p><?= htmlspecialchars($news['error']) ?></p>
                            <?php else: ?>
                                    <div class="news-details__left">
                                        <div class="news-details__img">
                                            <img src="<?= htmlspecialchars($item['picture']) ?>" alt="">
                                            <div class="news-details__date-box">
                                                <p><?=htmlspecialchars($item['publish_date'])?></p>
                                            </div>
                                        </div>
                                        <div class="news-details__content">
                                            <ul class="list-unstyled news-details__meta">
                                                <li><a href="news-details.html"><i class="far fa-user-circle"></i> <?= htmlspecialchars($item['author']['full_name'] ?? 'Tidak Diketahui') ?></a></li>
                                                <li><span>/</span></li>
                                                <li><a href="news-details.html"><i class="far fa-comments"></i><?= htmlspecialchars($item['hits']) ?> Dilihat</a>
                                                </li>
                                            </ul>
                                            <h3 class="news-details__title"><?= htmlspecialchars($item['title']) ?></h3>
                                            <p class="news-details__text-one">"<?= htmlspecialchars($item['content']) ?>"</p>
                                        </div>
                                        <div class="news-details__bottom">
                                            <!--<p class="news-details__tags">
                                                <span>Tags:</span>
                                                <a href="#">Consulting</a>
                                                <a href="#">Banking</a>
                                            </p>-->
                                            <div class="news-details__social-list">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                                <a href="#" class="clr-dri"><i class="fab fa-dribbble"></i></a>
                                                <a href="#" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
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
                                <h3 class="sidebar__title">Categories</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                    <li><a href="#">Consulting <span class="icon-right-arrow"></span></a></li>
                                    <li class="active"><a href="#">Marketing <span class="icon-right-arrow"></span></a>
                                    </li>
                                    <li><a href="#">Technology <span class="icon-right-arrow"></span></a></li>
                                    <li><a href="#">Business & Finance <span class="icon-right-arrow"></span></a></li>
                                    <li><a href="#">Bank Cryptcy <span class="icon-right-arrow"></span></a></li>
                                </ul>
                            </div>
                            <div class="sidebar__single sidebar__tags">
                                <h3 class="sidebar__title">Tags</h3>
                                <div class="sidebar__tags-list">
                                    <a href="#">Consulting</a>
                                    <a href="#">Banking</a>
                                    <a href="#">Business</a>
                                    <a href="#">Marketing</a>
                                    <a href="#">technology</a>
                                </div>
                            </div>
                            <div class="sidebar__single sidebar__comments">
                                <h3 class="sidebar__title">Comments</h3>
                                <ul class="sidebar__comments-list list-unstyled">
                                    <li>
                                        <div class="sidebar__comments-icon">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                        <div class="sidebar__comments-text-box">
                                            <p>A Wordpress Commenter on <br> Launch New Mobile App</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__comments-icon">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                        <div class="sidebar__comments-text-box">
                                            <p>John Doe on Template:</p>
                                            <h5>Comments</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__comments-icon">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                        <div class="sidebar__comments-text-box">
                                            <p>A Wordpress Commenter on <br> Launch New Mobile App</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__comments-icon">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                        <div class="sidebar__comments-text-box">
                                            <p>John Doe on Template:</p>
                                            <h5>Comments</h5>
                                        </div>
                                    </li>
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
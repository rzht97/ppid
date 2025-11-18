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
        <section class="blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-single__left">
                            <div class="blog-single__content">
								<div id="news-data">
						
								<?php foreach ($news as $item ) :?>
                                <div class="blog-single__content-single">
                                    <div class="blog-single__content-img">
                                        <img src="<?= htmlspecialchars($item['title']) ?>" alt="">
                                        <div class="blog-single__date-box">
                                            <p><?php echo $berita->publish_date?></p>
                                        </div>
                                    </div>
                                    <div class="blog-single__content-box">
                                        <ul class="list-unstyled blog-single__meta">
                                            <li><a href="#"><i class="far fa-user-circle"></i> by Admin</a></li>
                                            <li><span>/</span></li>
                                            <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-single__title">
                                            <a href="blog-details.html"><?php echo $berita->Title?></a>
                                        </h3>
                                        <!--<p class="blog-single__text">There are many variations of passages of Lorem
                                            Ipsum available, but the majority have suffered alteration in some form, by
                                            injected humour, or randomised words which don't look even slightly
                                            believable. If you are going to use a passage of Lorem Ipsum.</p>-->
                                        <a href="<?php echo site_url('pub/overview/detail/')?>" class="blog-single__btn">Read More</a>
                                    </div>
                                </div>
								<?php endforeach; ?>
								<?php endif;?>
								</div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <!--<div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <form action="#" class="sidebar__search-form">
                                    <input type="search" placeholder="Search here">
                                    <button type="submit"><i class="icon-magnifying-glass"></i></button>
                                </form>
                            </div>
							
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Latest Posts</h3>
								<?php foreach ($highlight as $berita2):?>
                                <ul class="sidebar__post-list list-unstyled">
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="<?= base_url();?>upload/product/<?php echo $berita2->image?>" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="#" class="sidebar__post-content_meta"><i
                                                        class="far fa-comments"></i>0 Comments</a>
                                                <a href="<?php echo site_url('pub/overview/detail/'.$berita->berita_id)?>"><?php echo $berita2->judul?></a>
                                            </h3>
                                        </div>
                                    </li>
                                </ul>
								<?php endforeach;?>
                            </div>
							
                            <!--<div class="sidebar__single sidebar__category">
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
                            </div>-->
                            <!--<div class="sidebar__single sidebar__comments">
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
                            </div>-->
                        </div>
                    </div>-->
                </div>
                <div class="news-one__more">
                    <a href="blog-sidebar.html" class="thm-btn">Load More</a>
                </div><!-- /.news-one__more -->
            </div>
        </section>
        <!--Blog Single End-->

        <!--CTA One Start-->
        <?php $this->load->view("dev/partials/sectionapp.php")?>
        <!--CTA One End-->

        <!--Site Footer One Start-->
        <?php $this->load->view("dev/partials/footer.php")?>
        <!--Site Footer One End-->


    </div>
    <!-- /.page-wrapper -->


    <?php $this->load->view("dev/partials/mobilemenu.php")?>
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
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pengajuan Keberatan Atas Informasi - PPID Kab. Sumedang</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" />
    <link rel="manifest" href="<?= base_url() ?>newestassets/images/favicons/site.webmanifest" />
    <meta name="description" content="Aivons HTML Template For Business Consulting" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/aivons-icons/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/twentytwenty/twentytwenty.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/bxslider/css/jquery.bxslider.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons-responsive.css" />

    <!-- RTL Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons-rtl.css">

    <!-- color css -->
    <link rel="stylesheet" id="jssDefault" href="<?= base_url() ?>newestassets/css/colors/color-default.css">
    <link rel="stylesheet" id="jssMode" href="<?= base_url() ?>newestassets/css/modes/aivons-normal.css">
    <link href="<?= base_url() ?>inverse/css/colors/default.css" id="theme" rel="stylesheet">

    <!-- toolbar css -->
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons-toolbar.css">

    <!--button css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link href="<?= base_url() ?>inverse/css/style.css" rel="stylesheet">
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
                        <li><a href="https://ppid.sumedangkab.go.id">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Permohonan</li>
                    </ul>
                    <h2>KEBERATAN ATAS INFORMASI</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Form Permhononan-->
        <section class="message-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h1 class="box-title m-b-0">Form Pengajuan Keberatan Atas Informasi</h1>
                            <p class="text-muted m-b-30 font-13"></p>
                            <?php if($caritoken): ?>
                                <?php foreach($caritoken as $data): ?>
                                    <form data-toogle="validator" class="form-horizontal">
                                        <div class="form-body">
											<h3 class="box-title">A. Informasi Pengajuan Keberatan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Nomor e-tiket:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo $data->mohon_id ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tujuan Penggunaan Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo $data->tujuan ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <h3 class="box-title">Identitas Pemohon</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Nama :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo $data->nama ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Alamat :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo $data->alamat ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Pekerjaan :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo $data->pekerjaan ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												<div class = "col-md-6">
                                            		<div class="form-group">
                                                		<label class="control-label">No. Telepon :</label>
                                                		<div class="col-md-9">
                                                           	<p class="form-control-static"> <?php echo $data->nohp ?> </p>
                                                       	</div>
                                            		</div>
												</div>
											</div>
                                        </div>
                                    </form>
									<form  action="<?= base_url()?>index.php/keberatan/save" method="post" >
								<div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" <?php echo form_error('mohon_id') ? 'is-invalid' : '' ?> name = "mohon_id" value = "<?php echo $data->mohon_id?>" placeholder="mohon_id" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Alasan Pengajuan Keberatan</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" <?php echo form_error('alasan') ? 'is-invalid' : '' ?> name = "alasan">
                                            <option value = "a. Permohonan Informasi Publik Ditolak">a. Permohonan Informasi Publik Ditolak</option>
                                            <option value = "b. Informasi Berkala Tidak Disediakan">b. Informasi Berkala Tidak Disediakan</option>
                                            <option value = "c. Permohonan Informasi Tidak Ditanggapi">c. Permohonan Informasi Tidak Ditanggapi</option>
                                            <option value = "d. Permohonan Informasi Ditanggapi Sebagaimana Diminta">d. Permohonan Informasi Ditanggapi Sebagaimana Diminta</option>
                                            <option value = "e. Permintaan Informasi Tidak Dipenuhi">e. Permintaan Informasi Tidak Dipenuhi</option>
											<option value = "f. Biaya yang Dikenakan Tidak Wajar">f. Biaya yang Dikenakan Tidak Wajar</option>
											<option value = "g. Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan">g. Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan</option>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-md-12">Kronologi : </label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" <?php echo form_error('kronologi') ? 'is-invalid' : '' ?> name = "kronologi" rows="5" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit 1</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                                <?php endforeach; ?>
							<?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--Form Permohonan End-->

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

    <script src="<?= base_url() ?>inverse/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>inverse/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>inverse/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>inverse/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>inverse/js/custom.min.js"></script>
    <script src="<?= base_url() ?>inverse/js/validator.js"></script>

    <!--Style Switcher -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <?php $this->load->view('dev/admin/partials/js.php') ?>

</body>


</html>
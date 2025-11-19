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
                        <div class="white-box" style="padding: 30px;">
                            <h1 class="box-title m-b-0" style="font-size: 28px; margin-bottom: 10px;">
                                <i class="fa fa-exclamation-circle text-warning"></i> Form Pengajuan Keberatan Atas Informasi
                            </h1>
                            <p class="text-muted m-b-30 font-13">Silakan lengkapi form di bawah ini untuk mengajukan keberatan atas permohonan informasi Anda.</p>

                            <?php if($caritoken): ?>
                                <?php foreach($caritoken as $data): ?>

                                    <!-- Informasi Permohonan -->
                                    <div style="background-color: #f9f9f9; padding: 25px; border-radius: 8px; margin-bottom: 30px; border-left: 4px solid #ffc107;">
                                        <h3 style="margin-top: 0; color: #333; font-size: 20px; margin-bottom: 20px;">
                                            <i class="fa fa-info-circle"></i> Informasi Permohonan
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-bottom: 15px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block;">Nomor e-Tiket:</label>
                                                <div style="padding: 10px 15px; background-color: white; border-radius: 4px; border: 1px solid #e3e3e3;">
                                                    <strong style="color: #2c3e50; font-size: 16px;"><?php echo $data->mohon_id ?></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 15px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block;">Status Permohonan:</label>
                                                <div style="padding: 10px 15px; background-color: white; border-radius: 4px; border: 1px solid #e3e3e3;">
                                                    <span class="label label-info"><?php echo $data->status ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr style="margin: 20px 0; border-color: #e0e0e0;">

                                        <h4 style="color: #555; font-size: 16px; margin-bottom: 15px;">Identitas Pemohon</h4>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-bottom: 10px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block; font-size: 13px;">Nama:</label>
                                                <p style="margin: 0; color: #333;"><?php echo $data->nama ?></p>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 10px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block; font-size: 13px;">Pekerjaan:</label>
                                                <p style="margin: 0; color: #333;"><?php echo $data->pekerjaan ?></p>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 10px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block; font-size: 13px;">No. Telepon:</label>
                                                <p style="margin: 0; color: #333;"><?php echo $data->nohp ?></p>
                                            </div>
                                            <div class="col-md-6" style="margin-bottom: 10px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block; font-size: 13px;">Email:</label>
                                                <p style="margin: 0; color: #333;"><?php echo $data->email ?></p>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom: 10px;">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block; font-size: 13px;">Alamat:</label>
                                                <p style="margin: 0; color: #333;"><?php echo $data->alamat ?></p>
                                            </div>
                                            <div class="col-md-12">
                                                <label style="font-weight: 600; color: #666; margin-bottom: 5px; display: block; font-size: 13px;">Tujuan Penggunaan Informasi:</label>
                                                <p style="margin: 0; color: #333;"><?php echo $data->tujuan ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Keberatan -->
                                    <div style="background-color: #fff; padding: 25px; border-radius: 8px; border: 2px solid #e8e8e8;">
                                        <h3 style="margin-top: 0; color: #333; font-size: 20px; margin-bottom: 20px;">
                                            <i class="fa fa-edit"></i> Form Keberatan
                                        </h3>

                                        <form action="<?= base_url()?>index.php/keberatan/save" method="post">
                                            <input type="hidden" name="mohon_id" value="<?php echo $data->mohon_id?>" required>

                                            <div class="form-group" style="margin-bottom: 25px;">
                                                <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block; font-size: 15px;">
                                                    Alasan Pengajuan Keberatan <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="alasan" required style="padding: 12px; font-size: 14px; border-radius: 4px; border: 1px solid #ddd;">
                                                    <option value="">-- Pilih Alasan Keberatan --</option>
                                                    <option value="a. Permohonan Informasi Publik Ditolak">a. Permohonan Informasi Publik Ditolak</option>
                                                    <option value="b. Informasi Berkala Tidak Disediakan">b. Informasi Berkala Tidak Disediakan</option>
                                                    <option value="c. Permohonan Informasi Tidak Ditanggapi">c. Permohonan Informasi Tidak Ditanggapi</option>
                                                    <option value="d. Permohonan Informasi Tidak Ditanggapi Sebagaimana Diminta">d. Permohonan Informasi Tidak Ditanggapi Sebagaimana Diminta</option>
                                                    <option value="e. Permintaan Informasi Tidak Dipenuhi">e. Permintaan Informasi Tidak Dipenuhi</option>
                                                    <option value="f. Biaya yang Dikenakan Tidak Wajar">f. Biaya yang Dikenakan Tidak Wajar</option>
                                                    <option value="g. Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan">g. Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan</option>
                                                </select>
                                                <span class="help-block" style="margin-top: 5px;"><small>Pilih alasan yang sesuai dengan kondisi permohonan Anda</small></span>
                                            </div>

                                            <div class="form-group" style="margin-bottom: 25px;">
                                                <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block; font-size: 15px;">
                                                    Kronologi/Uraian Keberatan <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" name="kronologi" rows="6" required
                                                    placeholder="Jelaskan secara detail kronologi atau uraian keberatan Anda. Sertakan informasi relevan seperti tanggal, waktu, dan kejadian yang terjadi."
                                                    style="padding: 12px; font-size: 14px; border-radius: 4px; border: 1px solid #ddd;"></textarea>
                                                <span class="help-block" style="margin-top: 5px;"><small>Jelaskan kronologi atau uraian keberatan Anda sejelas mungkin</small></span>
                                            </div>

                                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e3e3e3; text-align: center;">
                                                <button type="submit" class="btn btn-success btn-lg" style="padding: 12px 40px; margin-right: 10px;">
                                                    <i class="fa fa-check"></i> Kirim Keberatan
                                                </button>
                                                <a href="<?php echo site_url('pub/cekstatus'); ?>" class="btn btn-default btn-lg" style="padding: 12px 40px;">
                                                    <i class="fa fa-times"></i> Batal
                                                </a>
                                            </div>
                                        </form>
                                    </div>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-warning" style="margin-top: 20px; padding: 20px;">
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Data Tidak Ditemukan!</strong><br>
                                    <span style="margin-top: 5px; display: inline-block;">Mohon maaf, data permohonan tidak ditemukan. Silakan kembali ke halaman pencarian.</span>
                                    <div style="margin-top: 15px;">
                                        <a href="<?php echo site_url('pub/cekstatus'); ?>" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Cari Permohonan
                                        </a>
                                    </div>
                                </div>
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
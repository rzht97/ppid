<!DOCTYPE html>
<html lang="en">


<head>
    <title>Detail Permohonan Informasi - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>

    <style>
        .message-box { padding: 40px 0; background: #fff; }
        .message-box .white-box { padding: 30px; max-width: 900px; margin: 0 auto; background: #fff; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); }
        .box-title { margin-top: 0; margin-bottom: 8px; font-size: 24px; color: #333; font-weight: 600; }
        .result-panel { margin-bottom: 20px; border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .result-panel .panel-heading { padding: 15px 20px; border: none; }
        .result-panel .panel-title { margin: 0; font-size: 16px; font-weight: 600; }
        .result-panel .panel-body { padding: 20px; background: #fff; }
        .content-box { background-color: #f8f9fa; padding: 15px 18px; border: 1px solid #e9ecef; border-radius: 8px; }
        .content-box p { white-space: pre-wrap; word-wrap: break-word; margin: 0; line-height: 1.6; font-size: 14px; color: #555; }
        .status-label { font-size: 14px; padding: 8px 15px; border-radius: 20px; }
        .action-section { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e3e3e3; text-align: center; }
        .alert-success { border-radius: 8px; border: none; background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%); }
        .action-section .btn { padding: 10px 25px; font-size: 14px; margin: 0 5px; }
        @media (max-width: 768px) {
            .message-box { padding: 30px 0; }
            .message-box .white-box { padding: 15px; }
            .action-section .btn { display: block; width: 100%; margin: 5px 0; }
        }
    </style>
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
                        <li>Detail Permohonan</li>
                    </ul>
                    <h2>DETAIL PERMOHONAN INFORMASI</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Detail Permohonan-->
        <section class="message-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Permohonan Informasi</h3>
                            <p class="text-muted">Informasi lengkap permohonan informasi publik Anda</p>

                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle"></i> <strong>Berhasil!</strong><br>
                                    <span style="margin-top: 5px; display: inline-block;"><?php echo $this->session->flashdata('success'); ?></span>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-success">
                                    <i class="fa fa-check-circle"></i> <strong>Permohonan Berhasil Dibuat!</strong><br>
                                    <span style="margin-top: 5px; display: inline-block;">Harap simpan nomor permohonan untuk pengecekan status informasi yang dimohon.</span>
                                </div>
                            <?php endif; ?>

                            <!-- Info Waktu -->
                            <div class="panel panel-default result-panel">
                                <div class="panel-heading" style="background-color: #f5f5f5;">
                                    <h4 class="panel-title">
                                        <i class="fa fa-calendar"></i> Informasi Waktu
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>ID Permohonan</strong></label>
                                                <p class="form-control-static"><span class="label label-primary" style="font-size: 14px; padding: 8px 15px;"><?php echo $permohonan->mohon_id ?></span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Tanggal Permohonan</strong></label>
                                                <p class="form-control-static"><?php echo $permohonan->tanggal ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pemohon -->
                            <div class="panel panel-info result-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-user"></i> Data Pemohon
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>Nama</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->nama ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>Pekerjaan</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->pekerjaan ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>No. HP</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->nohp ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>Email</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->email ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>Alamat</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->alamat ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Permohonan -->
                            <div class="panel panel-primary result-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-file-text"></i> Detail Permohonan
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Rincian Informasi yang Dibutuhkan</strong></label>
                                        <div class="content-box">
                                            <p style="margin: 0; font-size: 14px;"><?php echo trim($permohonan->rincian); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Tujuan Penggunaan Informasi</strong></label>
                                        <div class="content-box">
                                            <p style="margin: 0; font-size: 14px;"><?php echo trim($permohonan->tujuan); ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>Cara Memperoleh Informasi</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->caraperoleh ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="margin-bottom: 8px; font-size: 14px;"><strong>Cara Mendapatkan Salinan</strong></label>
                                                <p style="margin: 0; font-size: 14px;"><?php echo $permohonan->caradapat ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="panel panel-success result-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-check-circle"></i> Status Permohonan
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label style="margin-bottom: 8px;"><strong>Status Saat Ini</strong></label>
                                        <div>
                                            <?php if ($permohonan->status == 'Menunggu Verifikasi'): ?>
                                                <span class="label label-warning status-label">
                                                    <i class="fa fa-clock-o"></i> Menunggu Verifikasi
                                                </span>
                                            <?php elseif ($permohonan->status == 'Sedang Diproses'): ?>
                                                <span class="label label-info status-label">
                                                    <i class="fa fa-spinner fa-spin"></i> Sedang Diproses
                                                </span>
                                            <?php elseif ($permohonan->status == 'Selesai'): ?>
                                                <span class="label label-success status-label">
                                                    <i class="fa fa-check"></i> Selesai
                                                </span>
                                            <?php else: ?>
                                                <span class="label label-default status-label">
                                                    <?php echo $permohonan->status ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-section">
                                <a href="<?php echo site_url('cekstatus'); ?>" class="btn btn-default btn-lg">
                                    <i class="fa fa-search"></i> Cek Status
                                </a>
                                <a href="<?php echo site_url('publicpermohonan'); ?>" class="btn btn-primary btn-lg">
                                    <i class="fa fa-plus"></i> Ajukan Permohonan Baru
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--Detail Permohonan End-->

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

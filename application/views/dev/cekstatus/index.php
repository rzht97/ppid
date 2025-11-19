<!DOCTYPE html>
<html lang="en">


<head>
    <title>Cek Status Permohonan - PPID Kab. Sumedang</title>

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
                        <li>Cek Status</li>
                    </ul>
                    <h2>CEK STATUS PERMOHONAN</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Form Permhononan-->
        <section class="message-box" style="padding: 60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box" style="padding: 30px;">
                            <h3 class="box-title" style="margin-top: 0; margin-bottom: 10px;">Cek Status Permohonan Informasi</h3>
                            <p class="text-muted" style="margin-bottom: 30px;">Masukkan ID permohonan Anda untuk melihat status pemrosesan</p>

                            <!-- Form Pencarian -->
                            <div class="panel panel-default" style="margin-bottom: 30px;">
                                <div class="panel-body" style="background-color: #f9f9f9; padding: 30px;">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label class="control-label" style="margin-bottom: 8px;"><strong>ID Permohonan</strong></label>
                                                    <input type="text" name="token" placeholder="Contoh: P191125001" class="form-control input-lg" value="<?php echo $this->input->post('token'); ?>" required>
                                                    <span class="help-block" style="margin-top: 8px;"><small>ID dikirimkan ke email Anda saat mengajukan permohonan</small></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary btn-lg" name="type" value="filter" style="padding: 12px 40px;">
                                                    <i class="fa fa-search"></i> Cari Status
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Hasil Pencarian -->
                            <?php if($this->input->post('token')): ?>
                                <?php if($caritoken && count($caritoken) > 0): ?>
                                    <?php foreach($caritoken as $data): ?>
                                        <div class="alert alert-success" style="margin-bottom: 25px; padding: 15px;">
                                            <i class="fa fa-check-circle"></i> <strong>Permohonan Ditemukan!</strong>
                                        </div>

                                        <!-- Info Waktu -->
                                        <div class="panel panel-default" style="margin-bottom: 20px;">
                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 15px;">
                                                <h4 class="panel-title" style="margin: 0;">
                                                    <i class="fa fa-calendar"></i> Informasi Waktu
                                                </h4>
                                            </div>
                                            <div class="panel-body" style="padding: 25px;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-bottom: 15px;">
                                                            <label style="margin-bottom: 5px;"><strong>Tanggal Permohonan</strong></label>
                                                            <p class="form-control-static" style="margin: 0;"><?php echo $data->tanggal ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-bottom: 0;">
                                                            <label style="margin-bottom: 5px;"><strong>Tanggal Selesai</strong></label>
                                                            <p class="form-control-static" style="margin: 0;">
                                                                <?php echo !empty($data->tanggaljawab) ? $data->tanggaljawab : '-'; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Data Pemohon -->
                                        <div class="panel panel-info" style="margin-bottom: 20px;">
                                            <div class="panel-heading" style="padding: 15px;">
                                                <h4 class="panel-title" style="margin: 0;">
                                                    <i class="fa fa-user"></i> Data Pemohon
                                                </h4>
                                            </div>
                                            <div class="panel-body" style="padding: 25px;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-bottom: 20px;">
                                                            <label style="margin-bottom: 5px;"><strong>Nama</strong></label>
                                                            <p class="form-control-static" style="margin: 0;"><?php echo $data->nama ?></p>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 0;">
                                                            <label style="margin-bottom: 5px;"><strong>Email</strong></label>
                                                            <p class="form-control-static" style="margin: 0;"><?php echo $data->email ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-bottom: 20px;">
                                                            <label style="margin-bottom: 5px;"><strong>Alamat</strong></label>
                                                            <p class="form-control-static" style="margin: 0;"><?php echo $data->alamat ?></p>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 0;">
                                                            <label style="margin-bottom: 5px;"><strong>No. HP</strong></label>
                                                            <p class="form-control-static" style="margin: 0;"><?php echo $data->nohp ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Detail Permohonan -->
                                        <div class="panel panel-primary" style="margin-bottom: 20px;">
                                            <div class="panel-heading" style="padding: 15px;">
                                                <h4 class="panel-title" style="margin: 0;">
                                                    <i class="fa fa-file-text"></i> Detail Permohonan
                                                </h4>
                                            </div>
                                            <div class="panel-body" style="padding: 25px;">
                                                <div class="form-group" style="margin-bottom: 25px;">
                                                    <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Rincian Informasi yang Dibutuhkan</strong></label>
                                                    <div style="background-color: #ffffff; padding: 20px; border: 2px solid #e8e8e8; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                        <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #555;">
                                                            <?php echo $data->rincian ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-bottom: 0;">
                                                    <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Tujuan Penggunaan Informasi</strong></label>
                                                    <div style="background-color: #ffffff; padding: 20px; border: 2px solid #e8e8e8; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                        <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #555;">
                                                            <?php echo $data->tujuan ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status dan Hasil -->
                                        <div class="panel panel-success" style="margin-bottom: 25px;">
                                            <div class="panel-heading" style="padding: 15px;">
                                                <h4 class="panel-title" style="margin: 0;">
                                                    <i class="fa fa-check-circle"></i> Status dan Hasil Pemrosesan
                                                </h4>
                                            </div>
                                            <div class="panel-body" style="padding: 25px;">
                                                <div class="form-group" style="margin-bottom: 20px;">
                                                    <label style="margin-bottom: 10px;"><strong>Status Permohonan</strong></label>
                                                    <div>
                                                        <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                            <span class="label label-warning" style="font-size: 14px; padding: 10px 18px;">
                                                                <i class="fa fa-clock-o"></i> Menunggu Verifikasi
                                                            </span>
                                                        <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                            <span class="label label-info" style="font-size: 14px; padding: 10px 18px;">
                                                                <i class="fa fa-spinner fa-spin"></i> Sedang Diproses
                                                            </span>
                                                        <?php elseif ($data->status == 'Selesai'): ?>
                                                            <span class="label label-success" style="font-size: 14px; padding: 10px 18px;">
                                                                <i class="fa fa-check"></i> Selesai
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="label label-default" style="font-size: 14px; padding: 10px 18px;">
                                                                <?php echo $data->status ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <?php if (!empty($data->jawab)): ?>
                                                <div class="form-group" style="margin-bottom: 0;">
                                                    <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Jawaban/Hasil Pemrosesan</strong></label>
                                                    <div style="background-color: #e8f4f8; padding: 20px; border: 2px solid #b8dce8; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                        <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #31708f;">
                                                            <?php echo $data->jawab ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php else: ?>
                                                <div class="form-group" style="margin-bottom: 0;">
                                                    <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Jawaban/Hasil Pemrosesan</strong></label>
                                                    <div style="background-color: #f9f9f9; padding: 20px; border: 2px dashed #ddd; border-radius: 6px;">
                                                        <p class="text-muted" style="margin: 0; font-style: italic; text-align: center; font-size: 14px;">
                                                            <i class="fa fa-clock-o"></i> Belum ada jawaban. Permohonan masih dalam proses.
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Data Keberatan (jika ada) -->
                                        <?php if ($data->has_keberatan && isset($data->keberatan_data)): ?>
                                            <?php $keberatan = $data->keberatan_data; ?>

                                            <hr style="margin: 40px 0; border-top: 2px solid #e3e3e3;">

                                            <div class="alert alert-info" style="margin-bottom: 25px; padding: 15px;">
                                                <i class="fa fa-info-circle"></i> <strong>Permohonan ini memiliki keberatan yang telah diajukan</strong>
                                            </div>

                                            <!-- Info Keberatan -->
                                            <div class="panel panel-default" style="margin-bottom: 20px;">
                                                <div class="panel-heading" style="background-color: #f5f5f5; padding: 15px;">
                                                    <h4 class="panel-title" style="margin: 0;">
                                                        <i class="fa fa-exclamation-circle"></i> Informasi Keberatan
                                                    </h4>
                                                </div>
                                                <div class="panel-body" style="padding: 25px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="margin-bottom: 15px;">
                                                                <label style="margin-bottom: 5px;"><strong>ID Keberatan</strong></label>
                                                                <p class="form-control-static" style="margin: 0;">
                                                                    <span class="label label-warning" style="font-size: 14px; padding: 8px 15px;">
                                                                        <?php echo $keberatan->id_keberatan ?>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group" style="margin-bottom: 0;">
                                                                <label style="margin-bottom: 5px;"><strong>Tanggal Keberatan Diajukan</strong></label>
                                                                <p class="form-control-static" style="margin: 0;"><?php echo $keberatan->tanggal ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Detail Keberatan -->
                                            <div class="panel panel-warning" style="margin-bottom: 20px;">
                                                <div class="panel-heading" style="padding: 15px;">
                                                    <h4 class="panel-title" style="margin: 0;">
                                                        <i class="fa fa-file-text"></i> Detail Keberatan
                                                    </h4>
                                                </div>
                                                <div class="panel-body" style="padding: 25px;">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                        <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Alasan Keberatan</strong></label>
                                                        <div style="background-color: #fff3cd; padding: 20px; border: 2px solid #ffeaa7; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                            <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #856404;">
                                                                <?php echo $keberatan->alasan ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 0;">
                                                        <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Kronologi / Kasus Posisi</strong></label>
                                                        <div style="background-color: #ffffff; padding: 20px; border: 2px solid #e8e8e8; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                            <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #555;">
                                                                <?php echo $keberatan->kronologi ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Status dan Hasil Keberatan -->
                                            <div class="panel panel-success" style="margin-bottom: 25px;">
                                                <div class="panel-heading" style="padding: 15px;">
                                                    <h4 class="panel-title" style="margin: 0;">
                                                        <i class="fa fa-check-circle"></i> Status dan Hasil Keberatan
                                                    </h4>
                                                </div>
                                                <div class="panel-body" style="padding: 25px;">
                                                    <div class="form-group" style="margin-bottom: 20px;">
                                                        <label style="margin-bottom: 10px;"><strong>Status Keberatan</strong></label>
                                                        <div>
                                                            <?php if ($keberatan->status == 'Menunggu Verifikasi'): ?>
                                                                <span class="label label-warning" style="font-size: 14px; padding: 10px 18px;">
                                                                    <i class="fa fa-clock-o"></i> Menunggu Verifikasi
                                                                </span>
                                                            <?php elseif ($keberatan->status == 'Sedang Diproses'): ?>
                                                                <span class="label label-info" style="font-size: 14px; padding: 10px 18px;">
                                                                    <i class="fa fa-spinner fa-spin"></i> Sedang Diproses
                                                                </span>
                                                            <?php elseif ($keberatan->status == 'Diterima'): ?>
                                                                <span class="label label-success" style="font-size: 14px; padding: 10px 18px;">
                                                                    <i class="fa fa-check"></i> Diterima
                                                                </span>
                                                            <?php elseif ($keberatan->status == 'Ditolak'): ?>
                                                                <span class="label label-danger" style="font-size: 14px; padding: 10px 18px;">
                                                                    <i class="fa fa-times"></i> Ditolak
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="label label-default" style="font-size: 14px; padding: 10px 18px;">
                                                                    <?php echo $keberatan->status ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <?php if (!empty($keberatan->tanggapan)): ?>
                                                    <div class="form-group" style="margin-bottom: 20px;">
                                                        <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Tanggapan PPID</strong></label>
                                                        <div style="background-color: #e8f4f8; padding: 20px; border: 2px solid #b8dce8; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                            <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #31708f;">
                                                                <?php echo $keberatan->tanggapan ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty($keberatan->putusan)): ?>
                                                    <div class="form-group" style="margin-bottom: 0;">
                                                        <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Putusan Keberatan</strong></label>
                                                        <div style="background-color: #d4edda; padding: 20px; border: 2px solid #c3e6cb; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                            <p style="white-space: pre-wrap; margin: 0; line-height: 1.8; font-size: 14px; color: #155724;">
                                                                <?php echo $keberatan->putusan ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                    <?php if (empty($keberatan->tanggapan) && empty($keberatan->putusan)): ?>
                                                    <div class="form-group" style="margin-bottom: 0;">
                                                        <label style="margin-bottom: 10px; font-size: 15px; color: #333;"><strong>Tanggapan/Putusan</strong></label>
                                                        <div style="background-color: #f9f9f9; padding: 20px; border: 2px dashed #ddd; border-radius: 6px;">
                                                            <p class="text-muted" style="margin: 0; font-style: italic; text-align: center; font-size: 14px;">
                                                                <i class="fa fa-clock-o"></i> Belum ada tanggapan atau putusan. Keberatan masih dalam proses.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="text-center" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #e3e3e3;">
                                            <a href="<?php echo site_url('pub/cekstatus'); ?>" class="btn btn-default btn-lg" style="padding: 12px 30px; margin-right: 10px;">
                                                <i class="fa fa-search"></i> Cari Lagi
                                            </a>

                                            <?php if (!$data->has_keberatan): ?>
                                                <!-- Tombol Ajukan Keberatan - hanya muncul jika belum ada keberatan -->
                                                <a href="<?php echo site_url('keberatan/index/'.$data->mohon_id); ?>" class="btn btn-warning btn-lg" style="padding: 12px 30px;">
                                                    <i class="fa fa-exclamation-circle"></i> Ajukan Keberatan
                                                </a>
                                            <?php else: ?>
                                                <!-- Tombol lihat detail lengkap keberatan -->
                                                <a href="<?php echo site_url('keberatan/detail/'.$data->keberatan_data->id_keberatan); ?>" class="btn btn-info btn-lg" style="padding: 12px 30px;">
                                                    <i class="fa fa-eye"></i> Lihat Detail Lengkap
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- Pesan jika tidak ada data ditemukan -->
                                    <div class="alert alert-warning" style="margin-top: 20px; padding: 20px;">
                                        <i class="fa fa-exclamation-triangle"></i> <strong>Data Tidak Ditemukan!</strong><br>
                                        <span style="margin-top: 5px; display: inline-block;">ID permohonan yang Anda masukkan tidak ditemukan dalam sistem. Pastikan Anda memasukkan ID dengan benar.</span>
                                    </div>
                                <?php endif; ?>
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
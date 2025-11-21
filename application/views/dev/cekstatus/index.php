<!DOCTYPE html>
<html lang="en">


<head>
    <title>Cek Status Permohonan - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>

    <style>
        .message-box { padding: 40px 0; background: #f5f5f5; }
        .message-box .white-box { padding: 25px; max-width: 900px; margin: 0 auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); }
        .box-title { margin-top: 0; margin-bottom: 8px; font-size: 22px; }
        .search-panel { margin-bottom: 25px; }
        .search-panel .panel-body { background-color: #f9f9f9; padding: 25px; }
        .search-panel .btn { padding: 10px 30px; font-size: 14px; }
        .result-panel { margin-bottom: 20px; }
        .result-panel .panel-heading { padding: 12px 15px; }
        .result-panel .panel-title { margin: 0; font-size: 16px; }
        .result-panel .panel-body { padding: 20px; }
        .content-box { background-color: #fff; padding: 12px 15px; border: 2px solid #e8e8e8; border-radius: 6px; }
        .content-box p { white-space: pre-wrap; word-wrap: break-word; margin: 0; line-height: 1.6; font-size: 14px; color: #555; }
        .content-box.info { background-color: #e8f4f8; border-color: #b8dce8; }
        .content-box.info p { color: #31708f; }
        .content-box.warning { background-color: #fff3cd; border-color: #ffeaa7; }
        .content-box.warning p { color: #856404; }
        .content-box.success { background-color: #d4edda; border-color: #c3e6cb; }
        .content-box.success p { color: #155724; }
        .content-box.empty { background-color: #f9f9f9; padding: 20px; border: 2px dashed #ddd; text-align: center; }
        .status-label { font-size: 14px; padding: 8px 15px; }
        .action-section { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e3e3e3; text-align: center; }
        .action-section .btn { padding: 10px 25px; font-size: 14px; margin: 0 5px; }
        .keberatan-divider { margin: 30px 0; border-top: 2px solid #e3e3e3; }
        @media (max-width: 768px) { .message-box { padding: 30px 0; } .message-box .white-box { padding: 15px; } .action-section .btn { display: block; width: 100%; margin: 5px 0; } }
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
                        <li>Cek Status</li>
                    </ul>
                    <h2>CEK STATUS PERMOHONAN</h2>
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
                            <h3 class="box-title">Cek Status Permohonan Informasi</h3>
                            <p class="text-muted">Masukkan ID permohonan Anda untuk melihat status pemrosesan</p>

                            <!-- Form Pencarian -->
                            <div class="panel panel-default search-panel">
                                <div class="panel-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>ID Permohonan</strong></label>
                                                    <input type="text" name="token" placeholder="Contoh: P191125001" class="form-control input-lg" value="<?php echo $this->input->post('token'); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary btn-lg" name="type" value="filter">
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
                                        <div class="alert alert-success">
                                            <i class="fa fa-check-circle"></i> <strong>Permohonan Ditemukan!</strong>
                                        </div>

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
                                                            <label><strong>Tanggal Permohonan</strong></label>
                                                            <p class="form-control-static"><?php echo $data->tanggal ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><strong>Tanggal Selesai</strong></label>
                                                            <p class="form-control-static">
                                                                <?php echo !empty($data->tanggaljawab) ? $data->tanggaljawab : '-'; ?>
                                                            </p>
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
                                                            <label><strong>Nama</strong></label>
                                                            <p class="form-control-static"><?php echo $data->nama ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label><strong>Email</strong></label>
                                                            <p class="form-control-static"><?php echo $data->email ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><strong>Alamat</strong></label>
                                                            <p class="form-control-static"><?php echo $data->alamat ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label><strong>No. HP</strong></label>
                                                            <p class="form-control-static"><?php echo $data->nohp ?></p>
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
                                                        <p><?php echo trim($data->rincian); ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 8px; font-size: 14px;"><strong>Tujuan Penggunaan Informasi</strong></label>
                                                    <div class="content-box">
                                                        <p><?php echo trim($data->tujuan); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status dan Hasil -->
                                        <div class="panel panel-success result-panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <i class="fa fa-check-circle"></i> Status dan Hasil Pemrosesan
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 8px;"><strong>Status Permohonan</strong></label>
                                                    <div>
                                                        <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                            <span class="label label-warning status-label">
                                                                <i class="fa fa-clock-o"></i> Menunggu Verifikasi
                                                            </span>
                                                        <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                            <span class="label label-info status-label">
                                                                <i class="fa fa-spinner fa-spin"></i> Sedang Diproses
                                                            </span>
                                                        <?php elseif ($data->status == 'Selesai'): ?>
                                                            <span class="label label-success status-label">
                                                                <i class="fa fa-check"></i> Selesai
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="label label-default status-label">
                                                                <?php echo $data->status ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <?php if (!empty($data->jawab)): ?>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 8px; font-size: 14px;"><strong>Jawaban/Hasil Pemrosesan</strong></label>
                                                    <div class="content-box info">
                                                        <p><?php echo trim($data->jawab); ?></p>
                                                    </div>
                                                </div>
                                                <?php else: ?>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 8px; font-size: 14px;"><strong>Jawaban/Hasil Pemrosesan</strong></label>
                                                    <div class="content-box empty" style="padding: 15px; background-color: #f9f9f9; border-radius: 4px;">
                                                        <p class="text-muted" style="margin: 0; font-style: italic; font-size: 14px;">
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

                                            <hr class="keberatan-divider">

                                            <div class="alert alert-info">
                                                <i class="fa fa-info-circle"></i> <strong>Permohonan ini memiliki keberatan yang telah diajukan</strong>
                                            </div>

                                            <!-- Info Keberatan -->
                                            <div class="panel panel-default result-panel">
                                                <div class="panel-heading" style="background-color: #f5f5f5;">
                                                    <h4 class="panel-title">
                                                        <i class="fa fa-exclamation-circle"></i> Informasi Keberatan
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><strong>ID Keberatan</strong></label>
                                                                <p class="form-control-static">
                                                                    <span class="label label-warning status-label">
                                                                        <?php echo $keberatan->id_keberatan ?>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><strong>Tanggal Keberatan Diajukan</strong></label>
                                                                <p class="form-control-static"><?php echo $keberatan->tanggal ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Detail Keberatan -->
                                            <div class="panel panel-warning result-panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <i class="fa fa-file-text"></i> Detail Keberatan
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Alasan Keberatan</strong></label>
                                                        <div class="content-box warning">
                                                            <p><?php echo trim($keberatan->alasan); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Kronologi / Kasus Posisi</strong></label>
                                                        <div class="content-box">
                                                            <p><?php echo trim($keberatan->kronologi); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Status dan Hasil Keberatan -->
                                            <div class="panel panel-success result-panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <i class="fa fa-check-circle"></i> Status dan Hasil Keberatan
                                                    </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 8px;"><strong>Status Keberatan</strong></label>
                                                        <div>
                                                            <?php if ($keberatan->status == 'Menunggu Verifikasi'): ?>
                                                                <span class="label label-warning status-label">
                                                                    <i class="fa fa-clock-o"></i> Menunggu Verifikasi
                                                                </span>
                                                            <?php elseif ($keberatan->status == 'Sedang Diproses'): ?>
                                                                <span class="label label-info status-label">
                                                                    <i class="fa fa-spinner fa-spin"></i> Sedang Diproses
                                                                </span>
                                                            <?php elseif ($keberatan->status == 'Diterima'): ?>
                                                                <span class="label label-success status-label">
                                                                    <i class="fa fa-check"></i> Diterima
                                                                </span>
                                                            <?php elseif ($keberatan->status == 'Ditolak'): ?>
                                                                <span class="label label-danger status-label">
                                                                    <i class="fa fa-times"></i> Ditolak
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="label label-default status-label">
                                                                    <?php echo $keberatan->status ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <?php if (!empty($keberatan->tanggapan)): ?>
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Tanggapan PPID</strong></label>
                                                        <div class="content-box info">
                                                            <p><?php echo trim($keberatan->tanggapan); ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty($keberatan->putusan)): ?>
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Putusan Keberatan</strong></label>
                                                        <div class="content-box success">
                                                            <p><?php echo trim($keberatan->putusan); ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                    <?php if (empty($keberatan->tanggapan) && empty($keberatan->putusan)): ?>
                                                    <div class="form-group">
                                                        <label style="margin-bottom: 8px; font-size: 14px;"><strong>Tanggapan/Putusan</strong></label>
                                                        <div class="content-box empty">
                                                            <p class="text-muted" style="margin: 0; font-style: italic; font-size: 14px;">
                                                                <i class="fa fa-clock-o"></i> Belum ada tanggapan atau putusan. Keberatan masih dalam proses.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="action-section">
                                            <a href="<?php echo site_url('cekstatus'); ?>" class="btn btn-default btn-lg">
                                                <i class="fa fa-search"></i> Cari Lagi
                                            </a>

                                            <?php if (!$data->has_keberatan): ?>
                                                <!-- Tombol Ajukan Keberatan - hanya muncul jika belum ada keberatan -->
                                                <a href="<?php echo site_url('keberatan/index/'.$data->mohon_id); ?>" class="btn btn-warning btn-lg">
                                                    <i class="fa fa-exclamation-circle"></i> Ajukan Keberatan
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- Pesan jika tidak ada data ditemukan -->
                                    <div class="alert alert-warning">
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
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Cek Status Permohonan - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>

    <style>
        .message-box { padding: 40px 0; background: #fff; }
        .message-box .white-box { padding: 30px; max-width: 900px; margin: 0 auto; background: #fff; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.15); }
        .box-title { margin-top: 0; margin-bottom: 8px; font-size: 24px; color: #333; font-weight: 600; }
        .search-panel { margin-bottom: 25px; border: none; border-radius: 10px; overflow: hidden; }
        .search-panel .panel-body { background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%); padding: 30px; border-radius: 10px; }
        .search-panel .form-control { border: 2px solid #e0e0e0; border-radius: 8px; transition: all 0.3s ease; }
        .search-panel .form-control:focus { border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); }
        .search-panel .btn { padding: 12px 35px; font-size: 15px; border-radius: 8px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; transition: all 0.3s ease; }
        .search-panel .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(102,126,234,0.4); }
        .result-panel { margin-bottom: 20px; border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        .result-panel .panel-heading { padding: 15px 20px; border: none; }
        .result-panel .panel-title { margin: 0; font-size: 16px; font-weight: 600; }
        .result-panel .panel-body { padding: 20px; background: #fff; }
        .content-box { background-color: #f8f9fa; padding: 15px 18px; border: 1px solid #e9ecef; border-radius: 8px; }
        .content-box p { white-space: pre-wrap; word-wrap: break-word; margin: 0; line-height: 1.6; font-size: 14px; color: #555; }
        .content-box.info { background-color: #e8f4f8; border-color: #b8dce8; }
        .content-box.info p { color: #31708f; }
        .content-box.warning { background-color: #fff3cd; border-color: #ffeaa7; }
        .content-box.warning p { color: #856404; }
        .content-box.success { background-color: #d4edda; border-color: #c3e6cb; }
        .content-box.success p { color: #155724; }
        .status-label { font-size: 14px; padding: 8px 15px; border-radius: 20px; }
        .action-section { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e3e3e3; text-align: center; }
        .alert-success { border-radius: 8px; border: none; background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%); }
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
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="form-group">
                                                    <label class="control-label"><strong>ID Permohonan</strong></label>
                                                    <input type="text" name="token" id="tokenInput" placeholder="Contoh: P191125001" class="form-control input-lg" value="<?php echo $this->input->post('token'); ?>" required>
                                                    <span id="tokenError" class="help-block text-danger" style="display:none; margin-top: 8px;"></span>
                                                    <small class="text-muted" style="display: block; margin-top: 5px;">
                                                        <i class="fa fa-info-circle"></i> Format: P diikuti 9 angka (contoh: P221124001)
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" id="submitBtn" class="btn btn-primary btn-lg" name="type" value="filter" disabled>
                                                    <i class="fa fa-search"></i> Cari Status
                                                </button>
                                                <small id="submitHelp" class="text-muted" style="display: block; margin-top: 8px;">
                                                    <i class="fa fa-info-circle"></i> Masukkan ID permohonan dengan format yang benar untuk mencari
                                                </small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Error Message -->
                            <?php if(isset($error) && $error): ?>
                                <div class="alert alert-danger" style="border-radius: 8px;">
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Error!</strong><br>
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>

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
                                                            <label style="margin-bottom: 8px; font-size: 14px;"><strong>Nama</strong></label>
                                                            <p style="margin: 0; font-size: 14px;"><?php echo $data->nama ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 8px; font-size: 14px;"><strong>Email</strong></label>
                                                            <p style="margin: 0; font-size: 14px;"><?php echo $data->email ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 8px; font-size: 14px;"><strong>Alamat</strong></label>
                                                            <p style="margin: 0; font-size: 14px;"><?php echo $data->alamat ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="margin-bottom: 8px; font-size: 14px;"><strong>No. HP</strong></label>
                                                            <p style="margin: 0; font-size: 14px;"><?php echo $data->nohp ?></p>
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
                                                        <p style="margin: 0; font-size: 14px;"><?php echo trim($data->rincian); ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-bottom: 8px; font-size: 14px;"><strong>Tujuan Penggunaan Informasi</strong></label>
                                                    <div class="content-box">
                                                        <p style="margin: 0; font-size: 14px;"><?php echo trim($data->tujuan); ?></p>
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
                                                    <label style="margin-bottom: 8px; font-size: 14px;"><strong>Status Permohonan</strong></label>
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

                                                <div class="form-group">
                                                    <label style="margin-bottom: 8px; font-size: 14px;"><strong>Jawaban/Hasil Pemrosesan</strong></label>
                                                    <div class="content-box info" style="padding: 15px 18px;">
                                                        <?php if (!empty($data->jawab)): ?>
                                                        <p style="margin: 0; font-size: 14px;"><?php echo trim($data->jawab); ?></p>
                                                        <?php else: ?>
                                                        <p style="margin: 0; font-size: 14px;"><i class="fa fa-clock-o"></i> Belum ada jawaban. Permohonan masih dalam proses.</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
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
                                                        <div class="content-box info" style="padding: 15px 18px;">
                                                            <p style="margin: 0; font-size: 14px;"><i class="fa fa-clock-o"></i> Belum ada tanggapan atau putusan. Keberatan masih dalam proses.</p>
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

    <!-- Real-time validation for ID Permohonan -->
    <script>
    $(document).ready(function() {
        const tokenInput = $('#tokenInput');
        const tokenError = $('#tokenError');
        const submitBtn = $('#submitBtn');
        const submitHelp = $('#submitHelp');

        /**
         * Validator untuk ID Permohonan
         * Format: P diikuti 9 digit angka (total 10 karakter)
         * Contoh valid: P221124001
         */
        function validateToken(value) {
            // Hapus whitespace
            value = value.trim();

            // Cek jika kosong
            if (!value || value.length === 0) {
                return 'ID Permohonan wajib diisi';
            }

            // Konversi ke uppercase untuk validasi
            value = value.toUpperCase();

            // Cek panjang (harus 10 karakter: P + 9 digit)
            if (value.length !== 10) {
                return 'ID Permohonan harus 10 karakter (P diikuti 9 angka)';
            }

            // Cek format: P diikuti 9 digit angka
            // Format: P + DDMMYY + 3 digit increment
            if (!/^P\d{9}$/.test(value)) {
                return 'Format tidak valid. Harus P diikuti 9 angka (contoh: P221124001)';
            }

            return null; // Valid
        }

        /**
         * Tampilkan error atau hapus error
         */
        function showError(message) {
            if (message) {
                tokenError.text(message).show();
                tokenInput.closest('.form-group').addClass('has-error');
            } else {
                tokenError.hide();
                tokenInput.closest('.form-group').removeClass('has-error');
            }
        }

        /**
         * Update status tombol submit
         */
        function updateSubmitButton(isValid) {
            if (isValid) {
                submitBtn.prop('disabled', false);
                submitBtn.removeClass('btn-default').addClass('btn-primary');
                submitHelp.html('<i class="fa fa-check-circle text-success"></i> <span class="text-success">Format ID benar. Silakan klik tombol untuk mencari.</span>');
            } else {
                submitBtn.prop('disabled', true);
                submitBtn.removeClass('btn-primary').addClass('btn-default');
                submitHelp.html('<i class="fa fa-info-circle"></i> Masukkan ID permohonan dengan format yang benar untuk mencari');
            }
        }

        /**
         * Validasi field saat input atau blur
         */
        function validateField() {
            let value = tokenInput.val().trim();

            // Auto-uppercase
            if (value) {
                value = value.toUpperCase();
                tokenInput.val(value);
            }

            const error = validateToken(value);
            showError(error);
            updateSubmitButton(!error);
        }

        // Event listeners
        tokenInput.on('input', function() {
            validateField();
        });

        tokenInput.on('blur', function() {
            validateField();
        });

        // Validasi saat halaman dimuat (jika ada value dari POST)
        if (tokenInput.val()) {
            validateField();
        }

        // Prevent submit jika tidak valid
        $('form').on('submit', function(e) {
            const value = tokenInput.val().trim().toUpperCase();
            const error = validateToken(value);

            if (error) {
                e.preventDefault();
                showError(error);
                updateSubmitButton(false);

                // Scroll ke input
                $('html, body').animate({
                    scrollTop: tokenInput.offset().top - 100
                }, 300);

                return false;
            }

            return true;
        });
    });
    </script>

</body>


</html>
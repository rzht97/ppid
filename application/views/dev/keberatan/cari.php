<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pengajuan Keberatan Atas Informasi - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>

    <style>
        .message-box { background: #f5f5f5; padding: 40px 0; }
        .message-box .white-box { background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); padding: 25px; max-width: 900px; margin: 0 auto; }
        .box-title { font-size: 24px !important; margin-bottom: 8px !important; }
        .text-muted { font-size: 14px; margin-bottom: 20px; }
        .info-section { background-color: #f9f9f9; padding: 20px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #ffc107; }
        .info-section h3 { margin-top: 0; color: #333; font-size: 18px; margin-bottom: 15px; }
        .info-section h4 { color: #555; font-size: 15px; margin-bottom: 12px; margin-top: 15px; }
        .info-section .info-item { margin-bottom: 10px; }
        .info-section .info-label { font-weight: 600; color: #666; margin-bottom: 4px; display: block; font-size: 13px; }
        .info-section .info-value { padding: 8px 12px; background-color: white; border-radius: 4px; border: 1px solid #e3e3e3; }
        .info-section .info-value strong { color: #2c3e50; font-size: 14px; }
        .info-section .info-text { margin: 0; color: #333; font-size: 14px; }
        .info-section hr { margin: 15px 0; border-color: #e0e0e0; }
        .form-section { background-color: #fff; padding: 25px; border-radius: 6px; border: 2px solid #e0e0e0; margin-top: 20px; }
        .form-section h3 { margin-top: 0; color: #2c3e50; font-size: 20px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #f0f0f0; }
        .form-group { margin-bottom: 15px; }
        .form-group label { font-weight: 600; color: #34495e; margin-bottom: 8px; display: block; font-size: 14px; }
        .form-control { padding: 10px 12px; font-size: 14px; border-radius: 5px; border: 1px solid #d1d5db; height: auto; line-height: 1.5; }
        .form-control:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); outline: none; }
        textarea.form-control { resize: vertical; font-family: inherit; line-height: 1.4; }
        .help-block { margin-top: 6px; color: #6b7280; font-size: 13px; }
        .form-actions { margin-top: 25px; padding-top: 20px; border-top: 2px solid #f0f0f0; text-align: center; }
        .btn-lg { padding: 10px 30px; font-size: 14px; font-weight: 500; border-radius: 5px; }
        .btn-success { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-default { background-color: #f8f9fa; border: 1px solid #d1d5db; margin-left: 10px; }
        @media (max-width: 768px) { .message-box .white-box { padding: 15px; } .box-title { font-size: 20px !important; } .info-section, .form-section { padding: 15px; } .btn-lg { padding: 10px 20px; font-size: 13px; display: block; width: 100%; margin: 5px 0; } .btn-default { margin-left: 0; } }
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
                            <h1 class="box-title">
                                <i class="fa fa-exclamation-circle text-warning"></i> Form Pengajuan Keberatan Atas Informasi
                            </h1>
                            <p class="text-muted">Silakan lengkapi form di bawah ini untuk mengajukan keberatan atas permohonan informasi Anda.</p>

                            <?php if($caritoken): ?>
                                <?php foreach($caritoken as $data): ?>

                                    <!-- Informasi Permohonan -->
                                    <div class="info-section">
                                        <h3>
                                            <i class="fa fa-info-circle"></i> Informasi Permohonan
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-6 info-item">
                                                <label class="info-label">Nomor e-Tiket:</label>
                                                <div class="info-value">
                                                    <strong><?php echo $data->mohon_id ?></strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6 info-item">
                                                <label class="info-label">Status Permohonan:</label>
                                                <div class="info-value">
                                                    <span class="label label-info"><?php echo $data->status ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <h4>Identitas Pemohon</h4>
                                        <div class="row">
                                            <div class="col-md-6 info-item">
                                                <label class="info-label">Nama:</label>
                                                <p class="info-text"><?php echo $data->nama ?></p>
                                            </div>
                                            <div class="col-md-6 info-item">
                                                <label class="info-label">Pekerjaan:</label>
                                                <p class="info-text"><?php echo $data->pekerjaan ?></p>
                                            </div>
                                            <div class="col-md-6 info-item">
                                                <label class="info-label">No. Telepon:</label>
                                                <p class="info-text"><?php echo $data->nohp ?></p>
                                            </div>
                                            <div class="col-md-6 info-item">
                                                <label class="info-label">Email:</label>
                                                <p class="info-text"><?php echo $data->email ?></p>
                                            </div>
                                            <div class="col-md-12 info-item">
                                                <label class="info-label">Alamat:</label>
                                                <p class="info-text"><?php echo $data->alamat ?></p>
                                            </div>
                                            <div class="col-md-12 info-item">
                                                <label class="info-label">Tujuan Penggunaan Informasi:</label>
                                                <p class="info-text"><?php echo $data->tujuan ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Keberatan -->
                                    <div class="form-section">
                                        <h3>
                                            <i class="fa fa-edit"></i> Form Pengajuan Keberatan
                                        </h3>

                                        <form action="<?= base_url()?>keberatan/save" method="post">
                                            <input type="hidden" name="mohon_id" value="<?php echo $data->mohon_id?>" required>

                                            <div class="form-group">
                                                <label>
                                                    Alasan Pengajuan Keberatan <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="alasan" required>
                                                    <option value="" Hidden></option>
                                                    <option value="Permohonan Informasi Publik Ditolak">a. Permohonan Informasi Publik Ditolak</option>
                                                    <option value="Informasi Berkala Tidak Disediakan">b. Informasi Berkala Tidak Disediakan</option>
                                                    <option value="Permohonan Informasi Tidak Ditanggapi">c. Permohonan Informasi Tidak Ditanggapi</option>
                                                    <option value="Permohonan Informasi Tidak Ditanggapi Sebagaimana Diminta">d. Permohonan Informasi Tidak Ditanggapi Sebagaimana Diminta</option>
                                                    <option value="Permintaan Informasi Tidak Dipenuhi">e. Permintaan Informasi Tidak Dipenuhi</option>
                                                    <option value="Biaya yang Dikenakan Tidak Wajar">f. Biaya yang Dikenakan Tidak Wajar</option>
                                                    <option value="Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan">g. Informasi disampaikan Melebihi Jangka Waktu yang Ditentukan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>
                                                    Kronologi/Uraian Keberatan <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" name="kronologi" rows="7" required></textarea>                                                
                                            </div>

                                            <!-- Honeypot field - Anti-bot protection (DO NOT REMOVE) -->
                                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                                <label for="website_url">Leave this field blank</label>
                                                <input type="text" name="website_url" id="website_url" value="" tabindex="-1" autocomplete="off">
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-success btn-lg">
                                                    <i class="fa fa-check-circle"></i> Kirim Keberatan
                                                </button>
                                                <a href="<?php echo site_url('cekstatus'); ?>" class="btn btn-default btn-lg">
                                                    <i class="fa fa-times"></i> Batal
                                                </a>
                                            </div>
                                        </form>
                                    </div>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-warning">
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Data Tidak Ditemukan!</strong><br>
                                    Mohon maaf, data permohonan tidak ditemukan. Silakan kembali ke halaman pencarian.
                                    <div style="margin-top: 15px;">
                                        <a href="<?php echo site_url('cekstatus'); ?>" class="btn btn-primary">
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

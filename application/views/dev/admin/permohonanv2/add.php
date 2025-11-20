<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Permohonan - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php') ?>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right"></ul>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php') ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tambah Permohonan Informasi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?php echo site_url('admin/permohonan') ?>">Permohonan</a></li>
                            <li class="active">Tambah</li>
                        </ol>
                    </div>
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Form Tambah Permohonan Informasi</h3>
                            <p class="text-muted m-b-20">Isi semua field yang diperlukan untuk menambah permohonan baru</p>

                            <?php
                                // Read flashdata and target page
                                $success_msg = $this->session->flashdata('success');
                                $success_target = $this->session->flashdata('success_target');
                                $error_msg = $this->session->flashdata('error');
                                $error_target = $this->session->flashdata('error_target');
                                $validation_errors = validation_errors();

                                // Get current page URI
                                $current_uri = uri_string();

                                // Check if alert already shown this session
                                $alert_shown_key = '_alert_shown_' . md5($success_msg . $success_target);
                                $already_shown = $this->session->userdata($alert_shown_key);

                                // Only show alert if target matches current page AND not shown yet
                                $show_success = $success_msg && $success_target && ($success_target === $current_uri) && !$already_shown;
                                $show_error = $error_msg && $error_target && ($error_target === $current_uri);

                                // Mark as shown if displaying
                                if ($show_success) {
                                    $this->session->set_userdata($alert_shown_key, true);
                                }
                            ?>
                            <?php if($show_success): ?>
                                <div class="alert alert-success alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $success_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($show_error): ?>
                                <div class="alert alert-danger alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $error_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($validation_errors): ?>
                                <div class="alert alert-warning alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Validation Error!</h4>
                                    <?php echo $validation_errors; ?>
                                </div>
                            <?php endif; ?>

                            <form class="form-horizontal" action="<?php echo base_url("admin/permohonan/add") ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <!-- Data Pemohon -->
                                    <h4 class="m-t-30 m-b-20"><i class="fa fa-user"></i> Data Pemohon</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Nama <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?php echo set_value('nama'); ?>" required>
                                            <?php if(form_error('nama')): ?>
                                                <div class="text-danger"><?php echo form_error('nama'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Pekerjaan <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?>" name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" required>
                                            <?php if(form_error('pekerjaan')): ?>
                                                <div class="text-danger"><?php echo form_error('pekerjaan'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Alamat <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" value="<?php echo set_value('alamat'); ?>" required>
                                            <?php if(form_error('alamat')): ?>
                                                <div class="text-danger"><?php echo form_error('alamat'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Nomor HP <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control <?php echo form_error('nohp') ? 'is-invalid' : '' ?>" name="nohp" value="<?php echo set_value('nohp'); ?>" required>
                                            <?php if(form_error('nohp')): ?>
                                                <div class="text-danger"><?php echo form_error('nohp'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Email <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?php echo set_value('email'); ?>" required>
                                            <?php if(form_error('email')): ?>
                                                <div class="text-danger"><?php echo form_error('email'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Upload Foto KTP</strong></label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" name="ktp" accept="image/*,.pdf">
                                            <small class="text-muted">
                                                <i class="fa fa-info-circle"></i> Format: JPG, PNG, PDF (Maksimal 20MB). Jika tidak diupload, status akan "Belum Tersedia"
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Detail Permohonan -->
                                    <h4 class="m-t-40 m-b-20"><i class="fa fa-file-text"></i> Detail Permohonan</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Rincian Informasi yang Dibutuhkan <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control <?php echo form_error('rincian') ? 'is-invalid' : '' ?>" name="rincian" rows="5" required><?php echo set_value('rincian'); ?></textarea>
                                            <?php if(form_error('rincian')): ?>
                                                <div class="text-danger"><?php echo form_error('rincian'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Tujuan Penggunaan Informasi <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control <?php echo form_error('tujuan') ? 'is-invalid' : '' ?>" name="tujuan" rows="5" required><?php echo set_value('tujuan'); ?></textarea>
                                            <?php if(form_error('tujuan')): ?>
                                                <div class="text-danger"><?php echo form_error('tujuan'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Cara Memperoleh Informasi <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <select class="form-control <?php echo form_error('caraperoleh') ? 'is-invalid' : '' ?>" name="caraperoleh" required>
                                                <option value="">-- Pilih Cara Memperoleh Informasi --</option>
                                                <option value="Mendapat Salinan informasi (hardcopy/softcopy)" <?php echo set_select('caraperoleh', 'Mendapat Salinan informasi (hardcopy/softcopy)'); ?>>Mendapat Salinan informasi (hardcopy/softcopy)</option>
                                                <option value="Melihat/membaca/mendengarkan/mencatat" <?php echo set_select('caraperoleh', 'Melihat/membaca/mendengarkan/mencatat'); ?>>Melihat/membaca/mendengarkan/mencatat</option>
                                            </select>
                                            <?php if(form_error('caraperoleh')): ?>
                                                <div class="text-danger"><?php echo form_error('caraperoleh'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Cara Mendapatkan Salinan Informasi <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <select class="form-control <?php echo form_error('caradapat') ? 'is-invalid' : '' ?>" name="caradapat" required>
                                                <option value="">-- Pilih Cara Mendapatkan Salinan --</option>
                                                <option value="Mengambil Langsung" <?php echo set_select('caradapat', 'Mengambil Langsung'); ?>>Mengambil Langsung</option>
                                                <option value="Kurir" <?php echo set_select('caradapat', 'Kurir'); ?>>Kurir</option>
                                                <option value="Pos" <?php echo set_select('caradapat', 'Pos'); ?>>Pos</option>
                                                <option value="Faksimil" <?php echo set_select('caradapat', 'Faksimil'); ?>>Faksimil</option>
                                                <option value="E-mail" <?php echo set_select('caradapat', 'E-mail'); ?>>E-mail</option>
                                            </select>
                                            <?php if(form_error('caradapat')): ?>
                                                <div class="text-danger"><?php echo form_error('caradapat'); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                <i class="fa fa-save"></i> Simpan Permohonan
                                            </button>
                                            <a href="<?php echo site_url('admin/permohonan') ?>" class="btn btn-default waves-effect waves-light">
                                                <i class="fa fa-times"></i> Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2022, Diskominfosanditik Kab. Sumedang as PPID </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('dev/admin/partials/js.php') ?>
</body>

<script>
    // Auto-close alerts after 5 seconds
    $(document).ready(function() {
        setTimeout(function() {
            $('.auto-close-alert').fadeOut('slow', function() {
                $(this).alert('close');
            });
        }, 5000); // 5000ms = 5 seconds
    });
</script>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Proses Keberatan - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px; padding: 0 15px; display: flex; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <!-- Left: Logo + Toggle -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <!-- Compact Logo -->
                <a href="<?= site_url('admin/index') ?>" style="display: flex; align-items: center; text-decoration: none;">
                    <img src="<?= base_url()?>inverse/plugins/images/pixeladmin-logo.png" alt="PPID" style="height: 35px; width: auto;">
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #333; display: none;" class="d-md-inline">
                        PPID Kab. Sumedang
                    </span>
                </a>
                <!-- Sidebar Toggle -->
                <a href="javascript:void(0)" class="open-close waves-effect waves-light" style="padding: 8px 10px; color: #555; font-size: 18px; margin-left: 5px;">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title" style="padding: 10px 0; margin-bottom: 20px;">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <h4 class="page-title" style="margin: 0;">Proses Keberatan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12 text-right">
                        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0; display: inline-block;">
                            <li style="display: inline; color: #666;">
                                <a href="<?= site_url('admin/index') ?>" style="color: #5b9bd1;">Admin</a>
                                <span style="margin: 0 8px; color: #999;">/</span>
                            </li>
                            <li style="display: inline; color: #666;">
                                <a href="<?= site_url('admin/keberatan') ?>" style="color: #5b9bd1;">Keberatan</a>
                                <span style="margin: 0 8px; color: #999;">/</span>
                            </li>
                            <li style="display: inline; color: #333; font-weight: 500;">Proses</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Proses Keberatan</h3>
                            <br>

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
                                    <i class="fa fa-check-circle"></i> <?php echo $success_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($show_error): ?>
                                <div class="alert alert-danger alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-times-circle"></i> <?php echo $error_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($validation_errors): ?>
                                <div class="alert alert-warning alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian!</strong> Mohon perbaiki kesalahan berikut:
                                    <?php echo $validation_errors; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Data Pemohon -->
                            <div class="card border-secondary">
                                <div class="card-header" style="background-color: #f5f5f5;">
                                    <h4 class="card-title" style="margin: 0;">
                                        <i class="fa fa-user"></i> Data Pemohon
                                    </h4>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><strong>Nama Lengkap</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->nama) ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><strong>Email</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->email) ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><strong>No. HP</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->nohp) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Alasan Keberatan</strong></label>
                                                <p class="form-control-static" style="white-space: pre-wrap; background-color: #f9f9f9; padding: 10px; border: 1px solid #e3e3e3; border-radius: 4px;"><?php echo html_escape($keberatan->alasan) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Kronologi / Kasus Posisi</strong></label>
                                                <p class="form-control-static" style="white-space: pre-wrap; background-color: #f9f9f9; padding: 10px; border: 1px solid #e3e3e3; border-radius: 4px;"><?php echo html_escape($keberatan->kronologi) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Pemrosesan -->
                            <div class="panel panel-primary">
                                <div class="card-header">
                                    <h4 class="card-title" style="margin: 0;">
                                        <i class="fa fa-gavel"></i> Form Pemrosesan Keberatan
                                    </h4>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <form class="form-horizontal" action="<?php echo site_url('admin/keberatan/proses/'.$keberatan->id_keberatan) ?>" method="post">
                                        <!-- FIX HIGH: Add CSRF token -->
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                        <div class="form-group">
                                            <label class="col-md-12"><strong>Tanggapan <span class="text-danger">*</span></strong></label>
                                            <div class="col-md-12">
                                                <textarea class="form-control <?php echo form_error('tanggapan') ? 'is-invalid' : '' ?>" name="tanggapan" rows="5" placeholder="Masukkan tanggapan terhadap keberatan (minimal 10 karakter)" required><?php echo set_value('tanggapan'); ?></textarea>
                                                <?php if(form_error('tanggapan')): ?>
                                                    <div class="text-danger"><?php echo form_error('tanggapan'); ?></div>
                                                <?php endif; ?>
                                                <span class="help-block"><small>Berikan tanggapan yang jelas dan terperinci</small></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong>Putusan <span class="text-danger">*</span></strong></label>
                                            <div class="col-md-12">
                                                <textarea class="form-control <?php echo form_error('putusan') ? 'is-invalid' : '' ?>" name="putusan" rows="5" placeholder="Masukkan putusan terhadap keberatan" required><?php echo set_value('putusan'); ?></textarea>
                                                <?php if(form_error('putusan')): ?>
                                                    <div class="text-danger"><?php echo form_error('putusan'); ?></div>
                                                <?php endif; ?>
                                                <span class="help-block"><small>Jelaskan putusan yang diambil</small></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12"><strong>Status Keputusan <span class="text-danger">*</span></strong></label>
                                            <div class="col-sm-12">
                                                <select class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" name="status" required>
                                                    <option value="">-- Pilih Status Keputusan --</option>
                                                    <option value="Diterima" <?php echo set_select('status', 'Diterima'); ?>>Diterima</option>
                                                    <option value="Ditolak" <?php echo set_select('status', 'Ditolak'); ?>>Ditolak</option>
                                                </select>
                                                <?php if(form_error('status')): ?>
                                                    <div class="text-danger"><?php echo form_error('status'); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" name="btn" class="btn btn-success waves-effect waves-light">
                                                        <i class="fa fa-check"></i> Simpan Hasil Pemrosesan
                                                    </button>
                                                    <a href="<?php echo site_url('admin/keberatan') ?>" class="btn btn-secondary waves-effect waves-light">
                                                        <i class="fa fa-times"></i> Batal
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <?php $this->load->view('dev/admin/partials/js.php')?>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Permohonan - Admin PPID Kab. Sumedang</title>
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
                        <h4 class="page-title">Edit Permohonan Informasi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?php echo site_url('admin/permohonan') ?>">Permohonan</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Proses Permohonan Informasi</h3>
                            <p class="text-muted m-b-20">ID Permohonan: <strong><?php echo $permohonan->mohon_id ?></strong></p>

                            <?php
                                // Read flashdata and target page
                                $success_msg = $this->session->flashdata('success');
                                $success_target = $this->session->flashdata('success_target');
                                $error_msg = $this->session->flashdata('error');
                                $error_target = $this->session->flashdata('error_target');

                                // Get current page URI
                                $current_uri = uri_string();

                                // Only show alert if no target specified OR target matches current page
                                $show_success = $success_msg && (!$success_target || $success_target === $current_uri);
                                $show_error = $error_msg && (!$error_target || $error_target === $current_uri);
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

                            <form class="form-horizontal" action="<?php echo base_url("admin/permohonan/edit/".$permohonan->mohon_id) ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="mohon_id" value="<?php echo $permohonan->mohon_id ?>" />

                                <div class="form-body">
                                    <h4 class="m-t-30 m-b-20"><i class="fa fa-user"></i> Data Pemohon</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" class="active"><strong>Nama</strong></td>
                                                    <td width="30%"><?php echo $permohonan->nama ?></td>
                                                    <td width="20%" class="active"><strong>Pekerjaan</strong></td>
                                                    <td width="30%"><?php echo $permohonan->pekerjaan ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="active"><strong>Alamat</strong></td>
                                                    <td><?php echo $permohonan->alamat ?></td>
                                                    <td class="active"><strong>No HP</strong></td>
                                                    <td><?php echo $permohonan->nohp ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="active"><strong>Email</strong></td>
                                                    <td><?php echo $permohonan->email ?></td>
                                                    <td class="active"><strong>Tanggal Permohonan</strong></td>
                                                    <td><?php echo $permohonan->tanggal ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="active"><strong>KTP</strong></td>
                                                    <td colspan="3">
                                                        <?php if($permohonan->ktp != "Belum Tersedia"): ?>
                                                            <div class="m-t-10 m-b-10">
                                                                <img src="<?php echo base_url("upload/ktp/").$permohonan->ktp ?>" class="img-thumbnail" style="max-height: 150px; max-width: 250px;">
                                                                <div class="m-t-10">
                                                                    <a href="<?php echo base_url("upload/ktp/").$permohonan->ktp ?>" target="_blank" class="btn btn-info btn-sm">
                                                                        <i class="fa fa-search-plus"></i> Lihat Fullsize
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <span class="text-muted"><i>Belum tersedia</i></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <h4 class="m-t-40 m-b-20"><i class="fa fa-file-text"></i> Detail Permohonan</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Rincian Informasi yang Dibutuhkan</strong></label>
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <?php echo nl2br($permohonan->rincian) ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Tujuan Penggunaan Informasi</strong></label>
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <?php echo nl2br($permohonan->tujuan) ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Cara Memperoleh Informasi</strong></label>
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <?php echo $permohonan->caraperoleh ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Cara Mendapatkan Salinan Informasi</strong></label>
                                        <div class="col-md-12">
                                            <div class="well well-sm">
                                                <?php echo $permohonan->caradapat ?>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="m-t-40 m-b-20"><i class="fa fa-edit"></i> Proses Permohonan</h4>
                                    <hr class="m-t-0 m-b-30">

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Status Permohonan <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <select class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" name="status" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Selesai" <?php echo ($permohonan->status == 'Selesai') ? 'selected' : '' ?>>Selesai (Diterima)</option>
                                                <option value="Ditolak" <?php echo ($permohonan->status == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
                                            </select>
                                            <small class="text-muted">Status saat ini: <strong><?php echo $permohonan->status ?></strong></small>
                                            <?php if(form_error('status')): ?>
                                                <div class="text-danger"><?php echo form_error('status') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Jawaban/Keterangan <span class="text-danger">*</span></strong></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="6" <?php echo form_error('jawab') ? 'is-invalid' : '' ?> name="jawab" placeholder="Masukkan jawaban atau keterangan atas permohonan informasi ini..." required><?php echo $permohonan->jawab ?></textarea>
                                            <small class="text-muted">
                                                <i class="fa fa-info-circle"></i>
                                                Untuk status <strong>Selesai</strong>: Jelaskan informasi yang diberikan atau lampiran yang disediakan.<br>
                                                Untuk status <strong>Ditolak</strong>: Jelaskan alasan penolakan sesuai ketentuan yang berlaku.
                                            </small>
                                            <?php if(form_error('jawab')): ?>
                                                <div class="text-danger"><?php echo form_error('jawab') ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="btn" value="submit" class="btn btn-success waves-effect waves-light">
                                                <i class="fa fa-check"></i> Submit & Proses
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
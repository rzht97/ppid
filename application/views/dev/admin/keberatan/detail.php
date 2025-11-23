<!DOCTYPE html>
<html lang="en">

<head>
	<title>Detail Keberatan - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px;">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="d-none d-sm-inline"><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left d-none d-sm-inline">
                    <li><a href="javascript:void(0)" class="open-close d-none d-sm-inline waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right float-right"></ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <h4 class="page-title">Detail Keberatan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="<?php echo site_url('admin/keberatan') ?>">Keberatan</a></li>
                            <li class="active">Detail</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Detail Keberatan</h3>
                            <br>

                            <!-- Data Pemohon -->
                            <div class="card border-secondary">
                                <div class="card-header" style="background-color: #f5f5f5;">
                                    <h4 class="card-title" style="margin: 0;">
                                        <i class="fa fa-user"></i> Data Pemohon
                                    </h4>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Nama Lengkap</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->nama) ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Email</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->email) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>No. HP</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->nohp) ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>Tanggal Pengajuan</strong></label>
                                                <p class="form-control-static"><?php echo html_escape($keberatan->tanggal) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Keberatan -->
                            <div class="card border-info">
                                <div class="card-header">
                                    <h4 class="card-title" style="margin: 0;">
                                        <i class="fa fa-file-text"></i> Data Keberatan
                                    </h4>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <div class="form-group">
                                        <label><strong>Alasan Keberatan</strong></label>
                                        <p class="form-control-static" style="white-space: pre-wrap;"><?php echo html_escape($keberatan->alasan) ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Kronologi / Kasus Posisi</strong></label>
                                        <p class="form-control-static" style="white-space: pre-wrap;"><?php echo html_escape($keberatan->kronologi) ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Status</strong></label>
                                        <div>
                                            <?php if ($keberatan->status == 'Menunggu Verifikasi' || $keberatan->status == 'Belum Diverifikasi'): ?>
                                                <span class="badge badge-warning" style="font-size: 13px; padding: 8px 12px;">
                                                    <?php echo html_escape($keberatan->status) ?>
                                                </span>
                                            <?php elseif ($keberatan->status == 'Sedang Diproses'): ?>
                                                <span class="badge badge-info" style="font-size: 13px; padding: 8px 12px;">
                                                    Sedang Diproses
                                                </span>
                                            <?php elseif ($keberatan->status == 'Diterima' || $keberatan->status == 'Selesai'): ?>
                                                <span class="badge badge-success" style="font-size: 13px; padding: 8px 12px;">
                                                    <?php echo html_escape($keberatan->status) ?>
                                                </span>
                                            <?php elseif ($keberatan->status == 'Ditolak'): ?>
                                                <span class="badge badge-danger" style="font-size: 13px; padding: 8px 12px;">
                                                    Ditolak
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary" style="font-size: 13px; padding: 8px 12px;">
                                                    <?php echo html_escape($keberatan->status) ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hasil Pemrosesan (jika sudah diproses) -->
                            <?php if (!empty($keberatan->tanggapan) || !empty($keberatan->putusan)): ?>
                            <div class="card border-success">
                                <div class="card-header">
                                    <h4 class="card-title" style="margin: 0;">
                                        <i class="fa fa-gavel"></i> Hasil Pemrosesan
                                    </h4>
                                </div>
                                <div class="card-body" style="padding: 20px;">
                                    <?php if (!empty($keberatan->tanggapan)): ?>
                                    <div class="form-group">
                                        <label><strong>Tanggapan</strong></label>
                                        <p class="form-control-static" style="white-space: pre-wrap;"><?php echo html_escape($keberatan->tanggapan) ?></p>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($keberatan->putusan)): ?>
                                    <div class="form-group">
                                        <label><strong>Putusan</strong></label>
                                        <p class="form-control-static" style="white-space: pre-wrap;"><?php echo html_escape($keberatan->putusan) ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Tombol Aksi -->
                            <div class="form-actions">
                                <a href="<?php echo site_url('admin/keberatan') ?>" class="btn btn-secondary waves-effect waves-light">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>

                                <?php if ($keberatan->status == 'Menunggu Verifikasi' || $keberatan->status == 'Belum Diverifikasi'): ?>
                                    <a href="<?php echo site_url('admin/keberatan/verifikasi/' . $keberatan->id_keberatan) ?>" class="btn btn-warning waves-effect waves-light" onclick="return confirm('Verifikasi keberatan ini?')">
                                        <i class="fa fa-check"></i> Verifikasi
                                    </a>
                                <?php endif; ?>

                                <?php if ($keberatan->status == 'Sedang Diproses'): ?>
                                    <a href="<?php echo site_url('admin/keberatan/proses/' . $keberatan->id_keberatan) ?>" class="btn btn-primary waves-effect waves-light">
                                        <i class="fa fa-gavel"></i> Proses
                                    </a>
                                <?php endif; ?>

                                <!-- FIX HIGH: Delete using POST method with CSRF token -->
                                <form id="delete-form-<?php echo $keberatan->id_keberatan ?>" action="<?php echo site_url('admin/keberatan/delete/' . $keberatan->id_keberatan) ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                    <button type="button" onclick="if(confirm('Yakin ingin menghapus keberatan ini?')) document.getElementById('delete-form-<?php echo $keberatan->id_keberatan ?>').submit();" class="btn btn-danger waves-effect waves-light">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
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

</html>

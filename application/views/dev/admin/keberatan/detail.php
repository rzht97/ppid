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
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px; padding: 0 15px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
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

            <!-- Right: User Actions -->
            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="<?= site_url('admin/index') ?>" class="waves-effect" style="padding: 6px 12px; color: #666; font-size: 14px; text-decoration: none; border-radius: 4px;" title="Dashboard">
                    <i class="fa fa-home"></i>
                    <span class="d-none d-lg-inline" style="margin-left: 5px;">Dashboard</span>
                </a>
                <a href="<?= base_url('index.php/login/logout') ?>" class="waves-effect" style="padding: 6px 12px; color: #fff; background: #d9534f; font-size: 14px; text-decoration: none; border-radius: 4px;" title="Logout">
                    <i class="fa fa-power-off"></i>
                    <span class="d-none d-lg-inline" style="margin-left: 5px;">Logout</span>
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
                        <h4 class="page-title" style="margin: 0;">Detail Keberatan</h4>
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
                            <li style="display: inline; color: #333; font-weight: 500;">Detail</li>
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

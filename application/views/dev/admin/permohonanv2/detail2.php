<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Permohonan - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php') ?>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="d-none d-sm-inline"><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left d-none d-sm-inline">
                    <li><a href="javascript:void(0)" class="open-close d-none d-sm-inline waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right float-right"></ul>
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <h4 class="page-title">Detail Permohonan Informasi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?php echo site_url('admin/permohonan') ?>">Permohonan</a></li>
                            <li class="active">Detail</li>
                        </ol>
                    </div>
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Detail Permohonan Informasi</h3>
                            <p class="text-muted m-b-20">ID Permohonan: <strong><?php echo html_escape($permohonan->mohon_id) ?></strong></p>

                            <!-- Data Pemohon -->
                            <h4 class="m-t-30 m-b-20"><i class="fa fa-user"></i> Data Pemohon</h4>
                            <hr class="m-t-0 m-b-30">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="20%" class="active"><strong>Nama</strong></td>
                                            <td width="30%"><?php echo html_escape($permohonan->nama) ?></td>
                                            <td width="20%" class="active"><strong>Pekerjaan</strong></td>
                                            <td width="30%"><?php echo html_escape($permohonan->pekerjaan) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Alamat</strong></td>
                                            <td><?php echo html_escape($permohonan->alamat) ?></td>
                                            <td class="active"><strong>No HP</strong></td>
                                            <td><?php echo html_escape($permohonan->nohp) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Email</strong></td>
                                            <td><?php echo html_escape($permohonan->email) ?></td>
                                            <td class="active"><strong>Tanggal Permohonan</strong></td>
                                            <td><?php echo html_escape($permohonan->tanggal) ?></td>
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

                            <!-- Detail Permohonan -->
                            <h4 class="m-t-40 m-b-20"><i class="fa fa-file-text"></i> Detail Permohonan</h4>
                            <hr class="m-t-0 m-b-30">

                            <div class="form-group">
                                <label class="col-md-12"><strong>Rincian Informasi yang Dibutuhkan</strong></label>
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <?php echo nl2br(html_escape($permohonan->rincian)) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong>Tujuan Penggunaan Informasi</strong></label>
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <?php echo nl2br(html_escape($permohonan->tujuan)) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong>Cara Memperoleh Informasi</strong></label>
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <?php echo html_escape($permohonan->caraperoleh) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong>Cara Mendapatkan Salinan Informasi</strong></label>
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <?php echo html_escape($permohonan->caradapat) ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Hasil Proses Permohonan -->
                            <h4 class="m-t-40 m-b-20"><i class="fa fa-check-circle"></i> Hasil Proses Permohonan</h4>
                            <hr class="m-t-0 m-b-30">

                            <div class="form-group">
                                <label class="col-md-12"><strong>Status Permohonan</strong></label>
                                <div class="col-md-12">
                                    <div class="p-t-10 p-b-10">
                                        <?php if($permohonan->status == "Selesai"): ?>
                                            <span class="badge badge-success" style="font-size: 14px; padding: 10px 15px;">
                                                <i class="fa fa-check-circle"></i> <?php echo html_escape($permohonan->status) ?>
                                            </span>
                                        <?php elseif($permohonan->status == "Ditolak"): ?>
                                            <span class="badge badge-danger" style="font-size: 14px; padding: 10px 15px;">
                                                <i class="fa fa-times-circle"></i> <?php echo html_escape($permohonan->status) ?>
                                            </span>
                                        <?php elseif($permohonan->status == "Sedang Diproses"): ?>
                                            <span class="badge badge-warning" style="font-size: 14px; padding: 10px 15px;">
                                                <i class="fa fa-spinner"></i> <?php echo html_escape($permohonan->status) ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-info" style="font-size: 14px; padding: 10px 15px;">
                                                <i class="fa fa-clock-o"></i> <?php echo html_escape($permohonan->status) ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if($permohonan->tanggaljawab): ?>
                                            <span class="text-muted m-l-15" style="display: inline-block; margin-top: 5px;">
                                                <i class="fa fa-calendar"></i> Diproses pada: <strong><?php echo html_escape($permohonan->tanggaljawab) ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if($permohonan->jawab): ?>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Jawaban/Keterangan</strong></label>
                                <div class="col-md-12">
                                    <div class="well well-sm" style="background-color: #f9f9f9; padding: 15px;">
                                        <?php echo nl2br(html_escape($permohonan->jawab)) ?>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Jawaban/Keterangan</strong></label>
                                <div class="col-md-12">
                                    <div class="alert alert-info" style="padding: 15px;">
                                        <i class="fa fa-info-circle"></i> Permohonan belum diproses atau dijawab
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo site_url('admin/permohonan') ?>" class="btn btn-secondary waves-effect waves-light">
                                            <i class="fa fa-arrow-left"></i> Kembali ke Daftar
                                        </a>
                                        <?php if($permohonan->status == "Sedang Diproses"): ?>
                                        <a href="<?php echo site_url('admin/permohonan/edit/' . $permohonan->mohon_id) ?>" class="btn btn-warning waves-effect waves-light">
                                            <i class="fa fa-edit"></i> Edit & Proses
                                        </a>
                                        <?php endif; ?>
                                    </div>
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
    <?php $this->load->view('dev/admin/partials/js.php') ?>
</body>

</html>

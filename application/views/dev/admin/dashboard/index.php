<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg" href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="<?= site_url('admin/index') ?>">
                        <b><img src="<?= base_url()?>inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b>
                        <span class="hidden-xs"><img src="<?= base_url()?>inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right"></ul>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Info Boxes -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-file-text fa-3x text-info"></i></div>
                                <div class="col-xs-9 text-right">
                                    <span class="font-light">Total Permohonan</span>
                                    <h2 class="font-bold"><?php echo $total_permohonan ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-check-circle fa-3x text-success"></i></div>
                                <div class="col-xs-9 text-right">
                                    <span class="font-light">Selesai</span>
                                    <h2 class="font-bold"><?php echo $permohonan_selesai ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-clock-o fa-3x text-warning"></i></div>
                                <div class="col-xs-9 text-right">
                                    <span class="font-light">Diproses</span>
                                    <h2 class="font-bold"><?php echo $permohonan_proses ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-exclamation-triangle fa-3x text-danger"></i></div>
                                <div class="col-xs-9 text-right">
                                    <span class="font-light">Keberatan</span>
                                    <h2 class="font-bold"><?php echo $total_keberatan ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tables -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Permohonan Terbaru</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr><th>ID</th><th>Nama</th><th>Tanggal</th><th>Status</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($permohonan_terbaru)): ?>
                                            <?php foreach ($permohonan_terbaru as $data): ?>
                                            <tr>
                                                <td><?php echo html_escape($data->mohon_id) ?></td>
                                                <td><?php echo html_escape($data->nama) ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                <td>
                                                    <?php if ($data->status == 'Selesai'): ?>
                                                        <span class="label label-success">Selesai</span>
                                                    <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                        <span class="label label-info">Proses</span>
                                                    <?php elseif ($data->status == 'Ditolak'): ?>
                                                        <span class="label label-danger">Ditolak</span>
                                                    <?php else: ?>
                                                        <span class="label label-warning">Verifikasi</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="<?php echo site_url('admin/permohonan') ?>" class="btn btn-info btn-sm">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Keberatan Terbaru</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr><th>ID</th><th>ID Permohonan</th><th>Tanggal</th><th>Status</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($keberatan_terbaru)): ?>
                                            <?php foreach ($keberatan_terbaru as $data): ?>
                                            <tr>
                                                <td><?php echo html_escape($data->id_keberatan) ?></td>
                                                <td><?php echo html_escape($data->mohon_id) ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                <td>
                                                    <?php if ($data->status == 'Diterima'): ?>
                                                        <span class="label label-success">Diterima</span>
                                                    <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                        <span class="label label-info">Proses</span>
                                                    <?php elseif ($data->status == 'Ditolak'): ?>
                                                        <span class="label label-danger">Ditolak</span>
                                                    <?php else: ?>
                                                        <span class="label label-warning">Verifikasi</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="<?php echo site_url('admin/keberatan') ?>" class="btn btn-warning btn-sm">Lihat Semua</a>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer text-center"><?php echo date('Y') ?> &copy; PPID Kabupaten Sumedang</footer>
        </div>
    </div>

    <?php $this->load->view('dev/admin/partials/js.php')?>
</body>

</html>

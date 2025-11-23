<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px; padding: 0 20px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 4px rgba(0,0,0,0.08); border-bottom: 1px solid #e9ecef;">
            <!-- Left: Logo + Hamburger -->
            <div style="display: flex; align-items: center; gap: 20px;">
                <!-- Logo -->
                <a href="<?= site_url('admin/index') ?>" style="display: flex; align-items: center; text-decoration: none;">
                    <div style="width: 40px; height: 40px; background: #5b9bd1; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <span style="color: white; font-size: 20px; font-weight: 700;">P</span>
                    </div>
                </a>
                <!-- Hamburger Menu -->
                <a href="javascript:void(0)" class="open-close waves-effect waves-light" style="padding: 8px; color: #333; font-size: 20px; line-height: 1;">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- User Profile Header -->
                <div class="row" style="padding: 20px 0 15px 0; border-bottom: 1px solid #e9ecef; margin-bottom: 20px;">
                    <div class="col-12">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <img src="<?= base_url()?>inverse/plugins/images/users/varun.jpg" alt="User" style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #e9ecef;">
                            <div>
                                <h4 style="margin: 0; font-size: 20px; font-weight: 600; color: #333;">Dashboard</h4>
                                <p style="margin: 0; font-size: 13px; color: #6c757d;">PPID Utama</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Boxes -->
                <div class="row">
                    <!-- Total Permohonan -->
                    <div class="col-lg-3 col-sm-6 col-12 mb-3">
                        <div class="white-box">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <i class="fa fa-file-text fa-3x text-info"></i>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="font-light d-block">Total Permohonan</span>
                                    <h2 class="font-bold mb-0"><?php echo $total_permohonan ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Selesai -->
                    <div class="col-lg-3 col-sm-6 col-12 mb-3">
                        <div class="white-box">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <i class="fa fa-check-circle fa-3x text-success"></i>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="font-light d-block">Selesai</span>
                                    <h2 class="font-bold mb-0"><?php echo $permohonan_selesai ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Diproses -->
                    <div class="col-lg-3 col-sm-6 col-12 mb-3">
                        <div class="white-box">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <i class="fa fa-clock-o fa-3x text-warning"></i>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="font-light d-block">Diproses</span>
                                    <h2 class="font-bold mb-0"><?php echo $permohonan_proses ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Keberatan -->
                    <div class="col-lg-3 col-sm-6 col-12 mb-3">
                        <div class="white-box">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="font-light d-block">Keberatan</span>
                                    <h2 class="font-bold mb-0"><?php echo $total_keberatan ?></h2>
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
                                                        <span class="badge badge-success">Selesai</span>
                                                    <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                        <span class="badge badge-info">Proses</span>
                                                    <?php elseif ($data->status == 'Ditolak'): ?>
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning">Verifikasi</span>
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
                                                        <span class="badge badge-success">Diterima</span>
                                                    <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                        <span class="badge badge-info">Proses</span>
                                                    <?php elseif ($data->status == 'Ditolak'): ?>
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning">Verifikasi</span>
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

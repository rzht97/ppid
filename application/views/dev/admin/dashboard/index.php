<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dashboard - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>

    <style>
        /* Global Dashboard Styles */
        body {
            background-color: #f8f9fa;
        }

        .container-fluid {
            padding: 30px 20px;
        }

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
        }

        .welcome-section h2 {
            color: white;
            margin: 0 0 10px 0;
            font-size: 32px;
            font-weight: 600;
        }

        .welcome-section p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
        }

        .welcome-section .greeting-icon {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        /* Stats Cards */
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid #eef2f7;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .stats-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .stats-card-title {
            font-size: 13px;
            color: #6c757d;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin: 0;
        }

        .stats-card-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .stats-card.permohonan .stats-card-icon {
            background: linear-gradient(135deg, #5cb85c 0%, #449d44 100%);
            color: white;
        }

        .stats-card.keberatan .stats-card-icon {
            background: linear-gradient(135deg, #f0ad4e 0%, #ec971f 100%);
            color: white;
        }

        .stats-number {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stats-card.permohonan .stats-number {
            background: linear-gradient(135deg, #5cb85c 0%, #449d44 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats-card.keberatan .stats-number {
            background: linear-gradient(135deg, #f0ad4e 0%, #ec971f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stats-breakdown {
            background: #f8f9fa;
            padding: 18px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .stats-breakdown-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .stats-breakdown-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .stats-breakdown-item:first-child {
            padding-top: 0;
        }

        .stats-breakdown-label {
            color: #6c757d;
            font-size: 13px;
            display: flex;
            align-items: center;
        }

        .stats-breakdown-label i {
            margin-right: 8px;
            font-size: 12px;
            opacity: 0.7;
        }

        .stats-breakdown-value {
            font-weight: 700;
            font-size: 16px;
            color: #2c3e50;
        }

        .stats-card-action {
            margin-top: 20px;
        }

        .stats-card-action .btn {
            width: 100%;
            padding: 10px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stats-card.permohonan .btn {
            background: linear-gradient(135deg, #5cb85c 0%, #449d44 100%);
            border: none;
            color: white;
        }

        .stats-card.keberatan .btn {
            background: linear-gradient(135deg, #f0ad4e 0%, #ec971f 100%);
            border: none;
            color: white;
        }

        .stats-card .btn:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Data Tables */
        .data-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid #eef2f7;
        }

        .data-card-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f8f9fa;
        }

        .data-card-title {
            margin: 0 0 8px 0;
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
        }

        .data-card-title i {
            margin-right: 10px;
        }

        .data-card-subtitle {
            margin: 0;
            font-size: 13px;
            color: #6c757d;
        }

        .recent-table {
            font-size: 13px;
            margin-bottom: 0;
        }

        .recent-table thead th {
            background-color: #f8f9fa;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            color: #6c757d;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e9ecef;
            padding: 12px;
        }

        .recent-table tbody td {
            padding: 12px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f5;
        }

        .recent-table tbody tr:last-child td {
            border-bottom: none;
        }

        .recent-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table-id {
            font-weight: 700;
            color: #2c3e50;
            font-family: monospace;
        }

        /* Status Badges */
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            display: inline-block;
        }

        .status-verifikasi {
            background: #fff3cd;
            color: #856404;
        }

        .status-proses {
            background: #cfe2ff;
            color: #084298;
        }

        .status-selesai, .status-diterima, .status-sudah {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-ditolak {
            background: #f8d7da;
            color: #842029;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.3;
        }

        /* Section Divider */
        .section-divider {
            margin: 40px 0 30px 0;
            border-top: 2px solid #e9ecef;
            padding-top: 25px;
        }

        .section-header {
            margin-bottom: 25px;
        }

        .section-header h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            display: flex;
            align-items: center;
        }

        .section-header h3 i {
            margin-right: 12px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 8px;
            font-size: 18px;
        }

        .section-header p {
            margin: 8px 0 0 48px;
            font-size: 13px;
            color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .stats-card {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .welcome-section {
                padding: 25px;
            }

            .welcome-section h2 {
                font-size: 24px;
            }

            .stats-number {
                font-size: 32px;
            }

            .section-divider {
                margin: 30px 0 20px 0;
                padding-top: 20px;
            }

            .section-header h3 {
                font-size: 18px;
            }

            .section-header p {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right"></ul>
            </div>
        </nav>
        <!-- End Top Navigation -->

        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>
        <!-- Left navbar-header end -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <div class="greeting-icon">
                        <i class="fa fa-dashboard"></i>
                    </div>
                    <h2>Dashboard PPID</h2>
                    <p>Selamat datang, <strong><?php echo $nama_user ?></strong>! Berikut adalah ringkasan sistem informasi PPID Kabupaten Sumedang.</p>
                </div>

                <!-- Section: Statistik -->
                <div class="section-header">
                    <h3>
                        <i class="fa fa-bar-chart"></i>
                        Statistik Sistem
                    </h3>
                    <p>Ringkasan data dari semua modul sistem PPID</p>
                </div>

                <!-- Statistik Cards -->
                <div class="row">
                    <!-- Card Permohonan -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-card permohonan">
                            <div class="stats-card-header">
                                <div>
                                    <h3 class="stats-card-title">Permohonan Informasi</h3>
                                    <div class="stats-number"><?php echo $total_permohonan ?></div>
                                </div>
                                <div class="stats-card-icon">
                                    <i class="fa fa-file-text"></i>
                                </div>
                            </div>

                            <div class="stats-breakdown">
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Menunggu Verifikasi
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $permohonan_verifikasi ?></span>
                                </div>
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Sedang Diproses
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $permohonan_proses ?></span>
                                </div>
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Selesai
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $permohonan_selesai ?></span>
                                </div>
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Ditolak
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $permohonan_ditolak ?></span>
                                </div>
                            </div>

                            <div class="stats-card-action">
                                <a href="<?php echo site_url('admin/permohonan') ?>" class="btn">
                                    <i class="fa fa-arrow-right"></i> Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card Keberatan -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-card keberatan">
                            <div class="stats-card-header">
                                <div>
                                    <h3 class="stats-card-title">Keberatan Informasi</h3>
                                    <div class="stats-number"><?php echo $total_keberatan ?></div>
                                </div>
                                <div class="stats-card-icon">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                            </div>

                            <div class="stats-breakdown">
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Menunggu Verifikasi
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $keberatan_verifikasi ?></span>
                                </div>
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Sedang Diproses
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $keberatan_proses ?></span>
                                </div>
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Diterima
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $keberatan_diterima ?></span>
                                </div>
                                <div class="stats-breakdown-item">
                                    <span class="stats-breakdown-label">
                                        <i class="fa fa-circle"></i> Ditolak
                                    </span>
                                    <span class="stats-breakdown-value"><?php echo $keberatan_ditolak ?></span>
                                </div>
                            </div>

                            <div class="stats-card-action">
                                <a href="<?php echo site_url('admin/keberatan') ?>" class="btn">
                                    <i class="fa fa-arrow-right"></i> Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Divider -->
                <div class="section-divider"></div>

                <!-- Section: Data Terbaru -->
                <div class="section-header">
                    <h3>
                        <i class="fa fa-clock-o"></i>
                        Data Terbaru
                    </h3>
                    <p>5 data terakhir yang masuk ke sistem dari setiap modul</p>
                </div>

                <!-- Data Terbaru -->
                <div class="row">
                    <!-- Permohonan Terbaru -->
                    <div class="col-lg-6">
                        <div class="data-card">
                            <div class="data-card-header">
                                <h3 class="data-card-title">
                                    <i class="fa fa-file-text text-success"></i> Permohonan Terbaru
                                </h3>
                                <p class="data-card-subtitle">5 permohonan terakhir yang masuk</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table recent-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($permohonan_terbaru)): ?>
                                            <?php foreach ($permohonan_terbaru as $data): ?>
                                                <tr>
                                                    <td><span class="table-id"><?php echo $data->mohon_id ?></span></td>
                                                    <td><?php echo $data->nama ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                    <td>
                                                        <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                            <span class="status-badge status-verifikasi">Verifikasi</span>
                                                        <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                            <span class="status-badge status-proses">Proses</span>
                                                        <?php elseif ($data->status == 'Selesai'): ?>
                                                            <span class="status-badge status-selesai">Selesai</span>
                                                        <?php else: ?>
                                                            <span class="status-badge status-ditolak">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="empty-state">
                                                        <i class="fa fa-inbox"></i>
                                                        <p>Belum ada data permohonan</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Keberatan Terbaru -->
                    <div class="col-lg-6">
                        <div class="data-card">
                            <div class="data-card-header">
                                <h3 class="data-card-title">
                                    <i class="fa fa-exclamation-triangle text-warning"></i> Keberatan Terbaru
                                </h3>
                                <p class="data-card-subtitle">5 keberatan terakhir yang masuk</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table recent-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Permohonan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($keberatan_terbaru)): ?>
                                            <?php foreach ($keberatan_terbaru as $data): ?>
                                                <tr>
                                                    <td><span class="table-id"><?php echo $data->id_keberatan ?></span></td>
                                                    <td><span class="table-id"><?php echo $data->mohon_id ?></span></td>
                                                    <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                    <td>
                                                        <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                            <span class="status-badge status-verifikasi">Verifikasi</span>
                                                        <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                            <span class="status-badge status-proses">Proses</span>
                                                        <?php elseif ($data->status == 'Diterima'): ?>
                                                            <span class="status-badge status-diterima">Diterima</span>
                                                        <?php else: ?>
                                                            <span class="status-badge status-ditolak">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="empty-state">
                                                        <i class="fa fa-inbox"></i>
                                                        <p>Belum ada data keberatan</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <?php echo date('Y') ?> &copy; PPID Kabupaten Sumedang </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dev/admin/partials/js.php')?>
</body>

</html>

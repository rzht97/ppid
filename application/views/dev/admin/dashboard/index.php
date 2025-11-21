<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dashboard - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>

    <style>
        .stats-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .stats-card .title {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .stats-card .number {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stats-card.informasi .number {
            color: #5bc0de;
        }

        .stats-card.permohonan .number {
            color: #5cb85c;
        }

        .stats-card.keberatan .number {
            color: #f0ad4e;
        }

        .stats-breakdown {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }

        .stats-breakdown .item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e8e8e8;
            font-size: 13px;
        }

        .stats-breakdown .item:last-child {
            border-bottom: none;
        }

        .stats-breakdown .label {
            color: #666;
        }

        .stats-breakdown .value {
            font-weight: 600;
            color: #333;
        }

        .recent-data-table {
            font-size: 13px;
        }

        .recent-data-table th {
            background-color: #f5f5f5;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            color: #666;
        }

        .badge-status {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-verifikasi {
            background-color: #ffeaa7;
            color: #856404;
        }

        .status-proses {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-selesai, .status-diterima, .status-sudah {
            background-color: #d4edda;
            color: #155724;
        }

        .status-ditolak {
            background-color: #f8d7da;
            color: #721c24;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .icon-box.informasi {
            background-color: #d9edf7;
            color: #5bc0de;
        }

        .icon-box.permohonan {
            background-color: #dff0d8;
            color: #5cb85c;
        }

        .icon-box.keberatan {
            background-color: #fcf8e3;
            color: #f0ad4e;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .welcome-banner h2 {
            margin: 0 0 10px 0;
            font-size: 28px;
        }

        .welcome-banner p {
            margin: 0;
            opacity: 0.9;
            font-size: 14px;
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
                <!-- Welcome Banner -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome-banner">
                            <h2><i class="fa fa-dashboard"></i> Dashboard PPID</h2>
                            <p>Selamat datang, <?php echo $nama_user ?>! Berikut adalah ringkasan sistem informasi PPID Kabupaten Sumedang.</p>
                        </div>
                    </div>
                </div>

                <!-- Statistik Cards -->
                <div class="row">
                    <!-- Card Daftar Informasi -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-card informasi">
                            <div class="icon-box informasi">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="title">Daftar Informasi Publik</div>
                            <div class="number"><?php echo $total_informasi ?></div>
                            <div class="stats-breakdown">
                                <div class="item">
                                    <span class="label">Belum Diproses</span>
                                    <span class="value"><?php echo $informasi_belum ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Sedang Diproses</span>
                                    <span class="value"><?php echo $informasi_sedang ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Sudah Diproses</span>
                                    <span class="value"><?php echo $informasi_sudah ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Ditolak</span>
                                    <span class="value"><?php echo $informasi_ditolak ?></span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?php echo site_url('admin/info') ?>" class="btn btn-info btn-sm btn-block">
                                    <i class="fa fa-arrow-right"></i> Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card Permohonan -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-card permohonan">
                            <div class="icon-box permohonan">
                                <i class="fa fa-file-text"></i>
                            </div>
                            <div class="title">Permohonan Informasi</div>
                            <div class="number"><?php echo $total_permohonan ?></div>
                            <div class="stats-breakdown">
                                <div class="item">
                                    <span class="label">Menunggu Verifikasi</span>
                                    <span class="value"><?php echo $permohonan_verifikasi ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Sedang Diproses</span>
                                    <span class="value"><?php echo $permohonan_proses ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Selesai</span>
                                    <span class="value"><?php echo $permohonan_selesai ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Ditolak</span>
                                    <span class="value"><?php echo $permohonan_ditolak ?></span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?php echo site_url('admin/overview') ?>" class="btn btn-success btn-sm btn-block">
                                    <i class="fa fa-arrow-right"></i> Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card Keberatan -->
                    <div class="col-lg-4 col-md-6">
                        <div class="stats-card keberatan">
                            <div class="icon-box keberatan">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="title">Keberatan Informasi</div>
                            <div class="number"><?php echo $total_keberatan ?></div>
                            <div class="stats-breakdown">
                                <div class="item">
                                    <span class="label">Menunggu Verifikasi</span>
                                    <span class="value"><?php echo $keberatan_verifikasi ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Sedang Diproses</span>
                                    <span class="value"><?php echo $keberatan_proses ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Diterima</span>
                                    <span class="value"><?php echo $keberatan_diterima ?></span>
                                </div>
                                <div class="item">
                                    <span class="label">Ditolak</span>
                                    <span class="value"><?php echo $keberatan_ditolak ?></span>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?php echo site_url('admin/keberatan') ?>" class="btn btn-warning btn-sm btn-block">
                                    <i class="fa fa-arrow-right"></i> Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Terbaru -->
                <div class="row">
                    <!-- Permohonan Terbaru -->
                    <div class="col-lg-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">
                                <i class="fa fa-file-text text-success"></i> Permohonan Terbaru
                            </h3>
                            <p class="text-muted m-b-20">5 permohonan terakhir yang masuk</p>
                            <div class="table-responsive">
                                <table class="table recent-data-table">
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
                                                    <td><strong><?php echo $data->mohon_id ?></strong></td>
                                                    <td><?php echo $data->nama ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                    <td>
                                                        <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                            <span class="badge-status status-verifikasi">Verifikasi</span>
                                                        <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                            <span class="badge-status status-proses">Proses</span>
                                                        <?php elseif ($data->status == 'Selesai'): ?>
                                                            <span class="badge-status status-selesai">Selesai</span>
                                                        <?php else: ?>
                                                            <span class="badge-status status-ditolak">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">Belum ada data permohonan</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Keberatan Terbaru -->
                    <div class="col-lg-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">
                                <i class="fa fa-exclamation-triangle text-warning"></i> Keberatan Terbaru
                            </h3>
                            <p class="text-muted m-b-20">5 keberatan terakhir yang masuk</p>
                            <div class="table-responsive">
                                <table class="table recent-data-table">
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
                                                    <td><strong><?php echo $data->id_keberatan ?></strong></td>
                                                    <td><?php echo $data->mohon_id ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                    <td>
                                                        <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                            <span class="badge-status status-verifikasi">Verifikasi</span>
                                                        <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                            <span class="badge-status status-proses">Proses</span>
                                                        <?php elseif ($data->status == 'Diterima'): ?>
                                                            <span class="badge-status status-diterima">Diterima</span>
                                                        <?php else: ?>
                                                            <span class="badge-status status-ditolak">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">Belum ada data keberatan</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Terbaru -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">
                                <i class="fa fa-info-circle text-info"></i> Informasi Publik Terbaru
                            </h3>
                            <p class="text-muted m-b-20">5 informasi publik terakhir</p>
                            <div class="table-responsive">
                                <table class="table recent-data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Pengaju</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($informasi_terbaru)): ?>
                                            <?php foreach ($informasi_terbaru as $data): ?>
                                                <tr>
                                                    <td><strong><?php echo $data->informasi_id ?></strong></td>
                                                    <td><?php echo substr($data->judul, 0, 50) ?><?php echo strlen($data->judul) > 50 ? '...' : '' ?></td>
                                                    <td><?php echo $data->pengaju ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                                    <td>
                                                        <?php if ($data->status == 'belum di proses'): ?>
                                                            <span class="badge-status status-verifikasi">Belum Diproses</span>
                                                        <?php elseif ($data->status == 'sedang diproses'): ?>
                                                            <span class="badge-status status-proses">Sedang Diproses</span>
                                                        <?php elseif ($data->status == 'sudah diproses'): ?>
                                                            <span class="badge-status status-sudah">Sudah Diproses</span>
                                                        <?php else: ?>
                                                            <span class="badge-status status-ditolak">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">Belum ada data informasi publik</td>
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

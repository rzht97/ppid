<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dashboard - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>

    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%); min-height: 100vh; }
        .container-fluid { padding: 25px; }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .welcome-card h2 { color: #fff; font-weight: 300; font-size: 28px; margin: 0 0 8px 0; }
        .welcome-card h2 strong { font-weight: 600; }
        .welcome-card p { color: rgba(255,255,255,0.85); margin: 0; font-size: 14px; }

        /* Mini Stats */
        .mini-stats { display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 25px; }
        .mini-stat {
            flex: 1;
            min-width: 140px;
            background: #fff;
            padding: 20px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: all 0.3s;
        }
        .mini-stat:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .mini-stat .number { font-size: 32px; font-weight: 700; margin-bottom: 5px; }
        .mini-stat .label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 0.5px; }
        .mini-stat.green .number { color: #10b981; }
        .mini-stat.blue .number { color: #3b82f6; }
        .mini-stat.orange .number { color: #f59e0b; }
        .mini-stat.red .number { color: #ef4444; }
        .mini-stat.purple .number { color: #8b5cf6; }

        /* Cards */
        .card-modern {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        .card-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-title { font-size: 16px; font-weight: 600; color: #333; margin: 0; }
        .card-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        /* Progress Items */
        .progress-item { margin-bottom: 15px; }
        .progress-item:last-child { margin-bottom: 0; }
        .progress-label { display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px; }
        .progress-label span:first-child { color: #666; }
        .progress-label span:last-child { font-weight: 600; color: #333; }
        .progress-bar-bg { height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden; }
        .progress-bar-fill { height: 100%; border-radius: 4px; transition: width 0.5s ease; }
        .progress-bar-fill.green { background: linear-gradient(90deg, #10b981, #34d399); }
        .progress-bar-fill.blue { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
        .progress-bar-fill.orange { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .progress-bar-fill.red { background: linear-gradient(90deg, #ef4444, #f87171); }

        /* Table */
        .table-modern { width: 100%; font-size: 13px; }
        .table-modern th { color: #888; font-weight: 500; text-transform: uppercase; font-size: 11px; letter-spacing: 0.5px; padding: 10px 12px; border-bottom: 2px solid #f1f5f9; }
        .table-modern td { padding: 12px; border-bottom: 1px solid #f8fafc; vertical-align: middle; }
        .table-modern tr:hover { background: #fafbfc; }
        .table-modern .id { font-family: monospace; font-weight: 600; color: #667eea; }

        /* Status Pills */
        .pill { padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; }
        .pill.yellow { background: #fef3c7; color: #d97706; }
        .pill.blue { background: #dbeafe; color: #2563eb; }
        .pill.green { background: #d1fae5; color: #059669; }
        .pill.red { background: #fee2e2; color: #dc2626; }

        /* Quick Actions */
        .quick-actions { display: flex; gap: 10px; flex-wrap: wrap; }
        .quick-btn {
            flex: 1;
            min-width: 120px;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
            color: #fff;
        }
        .quick-btn:hover { transform: scale(1.02); color: #fff; text-decoration: none; }
        .quick-btn i { font-size: 24px; display: block; margin-bottom: 8px; }
        .quick-btn span { font-size: 12px; font-weight: 500; }
        .quick-btn.btn-green { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .quick-btn.btn-orange { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .quick-btn.btn-blue { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }

        /* Empty */
        .empty-text { text-align: center; padding: 30px; color: #aaa; font-size: 13px; }

        /* Footer */
        .footer-modern { text-align: center; padding: 20px; color: #888; font-size: 12px; }

        @media (max-width: 768px) {
            .welcome-card { padding: 25px; }
            .welcome-card h2 { font-size: 22px; }
            .mini-stat { min-width: 100%; }
        }
    </style>
</head>

<body class="fix-sidebar">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg" href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="<?= site_url('admin/index') ?>">
                        <b><img src="<?= base_url()?>inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /></b>
                        <span class="hidden-xs"><img src="<?= base_url()?>inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /></span>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
            </div>
        </nav>

        <?php $this->load->view('dev/admin/partials/sidebar.php')?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Welcome -->
                <div class="welcome-card">
                    <h2>Selamat datang, <strong><?php echo $nama_user ?></strong></h2>
                    <p>Dashboard PPID Kabupaten Sumedang - <?php echo date('l, d F Y') ?></p>
                </div>

                <!-- Mini Stats -->
                <div class="mini-stats">
                    <div class="mini-stat green">
                        <div class="number"><?php echo $total_permohonan ?></div>
                        <div class="label">Total Permohonan</div>
                    </div>
                    <div class="mini-stat blue">
                        <div class="number"><?php echo $permohonan_selesai ?></div>
                        <div class="label">Selesai</div>
                    </div>
                    <div class="mini-stat orange">
                        <div class="number"><?php echo $permohonan_proses ?></div>
                        <div class="label">Diproses</div>
                    </div>
                    <div class="mini-stat red">
                        <div class="number"><?php echo $permohonan_ditolak ?></div>
                        <div class="label">Ditolak</div>
                    </div>
                    <div class="mini-stat purple">
                        <div class="number"><?php echo $total_keberatan ?></div>
                        <div class="label">Keberatan</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Progress Permohonan -->
                    <div class="col-md-4">
                        <div class="card-modern">
                            <div class="card-header-flex">
                                <h3 class="card-title">Status Permohonan</h3>
                                <span class="card-badge"><?php echo $total_permohonan ?> Total</span>
                            </div>
                            <?php $max = max($permohonan_verifikasi, $permohonan_proses, $permohonan_selesai, $permohonan_ditolak, 1); ?>
                            <div class="progress-item">
                                <div class="progress-label"><span>Menunggu Verifikasi</span><span><?php echo $permohonan_verifikasi ?></span></div>
                                <div class="progress-bar-bg"><div class="progress-bar-fill orange" style="width: <?php echo ($permohonan_verifikasi/$max)*100 ?>%"></div></div>
                            </div>
                            <div class="progress-item">
                                <div class="progress-label"><span>Sedang Diproses</span><span><?php echo $permohonan_proses ?></span></div>
                                <div class="progress-bar-bg"><div class="progress-bar-fill blue" style="width: <?php echo ($permohonan_proses/$max)*100 ?>%"></div></div>
                            </div>
                            <div class="progress-item">
                                <div class="progress-label"><span>Selesai</span><span><?php echo $permohonan_selesai ?></span></div>
                                <div class="progress-bar-bg"><div class="progress-bar-fill green" style="width: <?php echo ($permohonan_selesai/$max)*100 ?>%"></div></div>
                            </div>
                            <div class="progress-item">
                                <div class="progress-label"><span>Ditolak</span><span><?php echo $permohonan_ditolak ?></span></div>
                                <div class="progress-bar-bg"><div class="progress-bar-fill red" style="width: <?php echo ($permohonan_ditolak/$max)*100 ?>%"></div></div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="card-modern">
                            <h3 class="card-title" style="margin-bottom: 15px;">Aksi Cepat</h3>
                            <div class="quick-actions">
                                <a href="<?php echo site_url('admin/permohonan') ?>" class="quick-btn btn-green">
                                    <i class="fa fa-file-text"></i>
                                    <span>Permohonan</span>
                                </a>
                                <a href="<?php echo site_url('admin/keberatan') ?>" class="quick-btn btn-orange">
                                    <i class="fa fa-exclamation-circle"></i>
                                    <span>Keberatan</span>
                                </a>
                                <a href="<?php echo site_url('admin/dip') ?>" class="quick-btn btn-blue">
                                    <i class="fa fa-database"></i>
                                    <span>DIP</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Data -->
                    <div class="col-md-8">
                        <div class="card-modern">
                            <div class="card-header-flex">
                                <h3 class="card-title">Permohonan Terbaru</h3>
                                <a href="<?php echo site_url('admin/permohonan') ?>" style="font-size: 12px; color: #667eea;">Lihat Semua →</a>
                            </div>
                            <table class="table-modern">
                                <thead>
                                    <tr><th>ID</th><th>Nama</th><th>Tanggal</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($permohonan_terbaru)): ?>
                                        <?php foreach ($permohonan_terbaru as $data): ?>
                                        <tr>
                                            <td class="id"><?php echo $data->mohon_id ?></td>
                                            <td><?php echo $data->nama ?></td>
                                            <td><?php echo date('d M Y', strtotime($data->tanggal)) ?></td>
                                            <td>
                                                <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                    <span class="pill yellow">Verifikasi</span>
                                                <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                    <span class="pill blue">Proses</span>
                                                <?php elseif ($data->status == 'Selesai'): ?>
                                                    <span class="pill green">Selesai</span>
                                                <?php else: ?>
                                                    <span class="pill red">Ditolak</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="4" class="empty-text">Belum ada data</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-modern">
                            <div class="card-header-flex">
                                <h3 class="card-title">Keberatan Terbaru</h3>
                                <a href="<?php echo site_url('admin/keberatan') ?>" style="font-size: 12px; color: #667eea;">Lihat Semua →</a>
                            </div>
                            <table class="table-modern">
                                <thead>
                                    <tr><th>ID</th><th>ID Permohonan</th><th>Tanggal</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($keberatan_terbaru)): ?>
                                        <?php foreach ($keberatan_terbaru as $data): ?>
                                        <tr>
                                            <td class="id"><?php echo $data->id_keberatan ?></td>
                                            <td class="id"><?php echo $data->mohon_id ?></td>
                                            <td><?php echo date('d M Y', strtotime($data->tanggal)) ?></td>
                                            <td>
                                                <?php if ($data->status == 'Menunggu Verifikasi'): ?>
                                                    <span class="pill yellow">Verifikasi</span>
                                                <?php elseif ($data->status == 'Sedang Diproses'): ?>
                                                    <span class="pill blue">Proses</span>
                                                <?php elseif ($data->status == 'Diterima'): ?>
                                                    <span class="pill green">Diterima</span>
                                                <?php else: ?>
                                                    <span class="pill red">Ditolak</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="4" class="empty-text">Belum ada data</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-modern">&copy; <?php echo date('Y') ?> PPID Kabupaten Sumedang</div>
        </div>
    </div>

    <?php $this->load->view('dev/admin/partials/js.php')?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar Keberatan - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Daftar Keberatan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Keberatan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Daftar Keberatan</h3>
							<br>

							<?php
								// Read flashdata and target page
								$success_msg = $this->session->flashdata('success');
								$success_target = $this->session->flashdata('success_target');
								$error_msg = $this->session->flashdata('error');
								$error_target = $this->session->flashdata('error_target');

								// Get current page URI
								$current_uri = uri_string(); // e.g., "admin/keberatan"

								// Only show alert if target matches current page
								$show_success = $success_msg && ($success_target === $current_uri);
								$show_error = $error_msg && ($error_target === $current_uri);
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

							<br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <thead class="bg-light">
										<tr>
											<th width="40" class="text-center">No</th>
											<th>Nama Pemohon</th>
											<th>Email</th>
											<th width="120">No. HP</th>
											<th>Alasan Keberatan</th>
											<th width="150" class="text-center">Status</th>
											<th width="100" class="text-center">Tanggal</th>
											<th width="220" class="text-center">Aksi</th>
										</tr>
									</thead>
                                    <tbody>
									<?php $no = 1; ?>
									<?php foreach ($keberatan as $item): ?>
									<tr>
										<td class="text-center" style="vertical-align: middle;"><?php echo $no++; ?></td>
										<td style="vertical-align: middle;">
											<strong><?php echo $item->nama ?></strong>
										</td>
										<td style="vertical-align: middle;">
											<small><?php echo $item->email ?></small>
										</td>
										<td style="vertical-align: middle;">
											<small><?php echo $item->nohp ?></small>
										</td>
										<td style="vertical-align: middle;">
											<?php echo substr($item->alasan, 0, 100); ?><?php echo strlen($item->alasan) > 100 ? '...' : ''; ?>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<?php if ($item->status == 'Belum Diverifikasi'): ?>
												<span class="label label-warning" style="font-size: 11px; padding: 5px 10px;">
													Belum Diverifikasi
												</span>
											<?php elseif ($item->status == 'Sedang Diproses'): ?>
												<span class="label label-info" style="font-size: 11px; padding: 5px 10px;">
													Sedang Diproses
												</span>
											<?php elseif ($item->status == 'Diterima'): ?>
												<span class="label label-success" style="font-size: 11px; padding: 5px 10px;">
													Diterima
												</span>
											<?php elseif ($item->status == 'Ditolak'): ?>
												<span class="label label-danger" style="font-size: 11px; padding: 5px 10px;">
													Ditolak
												</span>
											<?php else: ?>
												<span class="label label-default" style="font-size: 11px; padding: 5px 10px;">
													<?php echo $item->status ?>
												</span>
											<?php endif; ?>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<small><?php echo $item->tanggal ?></small>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<div class="btn-group" role="group">
												<a href="<?php echo site_url('admin/keberatan/detail/' . $item->id_keberatan) ?>" class="btn btn-info btn-xs" title="Lihat Detail">
													<i class="fa fa-eye"></i> Lihat
												</a>
												<?php if ($item->status == 'Belum Diverifikasi'): ?>
													<a href="<?php echo site_url('admin/keberatan/verifikasi/' . $item->id_keberatan) ?>" class="btn btn-warning btn-xs" title="Verifikasi Keberatan" onclick="return confirm('Verifikasi keberatan ini?')">
														<i class="fa fa-check"></i> Verifikasi
													</a>
												<?php endif; ?>
												<?php if ($item->status == 'Sedang Diproses'): ?>
													<a href="<?php echo site_url('admin/keberatan/proses/' . $item->id_keberatan) ?>" class="btn btn-primary btn-xs" title="Proses Keberatan">
														<i class="fa fa-gavel"></i> Proses
													</a>
												<?php endif; ?>
												<a onclick="deleteConfirm('<?php echo site_url('admin/keberatan/delete/'.$item->id_keberatan) ?>')" href="#!" class="btn btn-danger btn-xs" title="Hapus Keberatan">
													<i class="fa fa-trash-o"></i> Hapus
												</a>
											</div>
										</td>
									</tr>
									<?php endforeach; ?>
									</tbody>
                                </table>
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
	<?php $this->load->view('dev/admin/partials/modal.php')?>
</body>

    <script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}

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

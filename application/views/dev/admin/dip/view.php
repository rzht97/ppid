<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar Informasi Publik - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px; padding: 0 15px; display: flex; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
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
                        <h4 class="page-title" style="margin: 0;">Daftar Informasi Publik</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12 text-right">
                        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0; display: inline-block;">
                            <li style="display: inline; color: #666;">
                                <a href="<?= site_url('admin/index') ?>" style="color: #5b9bd1;">Admin</a>
                                <span style="margin: 0 8px; color: #999;">/</span>
                            </li>
                            <li style="display: inline; color: #333; font-weight: 500;">Daftar Informasi</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Daftar Informasi Publik</h3>
							<br>

							<?php
								// Read flashdata and target page
								$success_msg = $this->session->flashdata('success');
								$success_target = $this->session->flashdata('success_target');
								$error_msg = $this->session->flashdata('error');
								$error_target = $this->session->flashdata('error_target');

								// Get current page URI
								$current_uri = uri_string();

								// Check if alert already shown this session
								$alert_shown_key = '_alert_shown_' . md5($success_msg . $success_target);
								$already_shown = $this->session->userdata($alert_shown_key);

								// Only show alert if target matches current page AND not shown yet
								$show_success = $success_msg && $success_target && ($success_target === $current_uri) && !$already_shown;
								$show_error = $error_msg && $error_target && ($error_target === $current_uri);

								// Mark as shown if displaying
								if ($show_success) {
									$this->session->set_userdata($alert_shown_key, true);
								}
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

							<div class="card-header">
								<a href="<?php echo site_url('admin/dip/add') ?>" class="fcbtn btn btn-outline btn-success btn-1b"><i class="fa fa-plus"></i> Tambah Informasi</a>
							</div>
							<br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <thead class="bg-light">
										<tr>
											<th width="40" class="text-center">No</th>
											<th>Ringkasan Isi Informasi</th>
											<th width="100" class="text-center">Tanggal</th>
											<th width="180">Kategori</th>
											<th width="150">Bentuk Informasi</th>
											<th width="150" class="text-center">Jangka Waktu Penyimpanan</th>
											<th width="90" class="text-center">Dokumen</th>
											<th width="160" class="text-center">Aksi</th>
										</tr>
									</thead>
                                    <tbody>
									<?php $no = 1; ?>
									<?php foreach ($dokumen as $dok_kec): ?>
									<tr>
										<td class="text-center" style="vertical-align: middle;"><?php echo $no++; ?></td>
										<td style="vertical-align: middle;">
											<strong><?php echo html_escape($dok_kec->judul) ?></strong>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<small><?php echo html_escape($dok_kec->tanggal) ?></small>
										</td>
										<td style="vertical-align: middle;">
											<span class="badge badge-primary" style="font-size: 11px; padding: 5px 10px;">
												<?php echo html_escape($dok_kec->kategori) ?>
											</span>
										</td>
										<td style="vertical-align: middle;">
											<small><?php echo html_escape($dok_kec->bentukinfo)?></small>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<small><?php echo html_escape($dok_kec->jangkawaktu)?></small>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<?php if ($dok_kec->image != "Belum Tersedia") { ?>
												<a href="<?php echo base_url().'index.php/admin/dip/download/'.$dok_kec->id; ?>" class="btn btn-success btn-xs" title="Download Dokumen">
													<i class="fa fa-download"></i> Download
												</a>
											<?php } else { ?>
												<span class="badge badge-secondary" style="font-size: 10px;">
													<?php echo html_escape($dok_kec->sumberdata); ?>
												</span>
											<?php } ?>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<div class="btn-group" role="group">
												<a href="<?php echo site_url('admin/dip/edit/' . $dok_kec->id) ?>" class="btn btn-warning btn-xs" title="Edit Informasi">
													<i class="fa fa-edit"></i> Edit
												</a>

												<!-- FIX HIGH: Delete using POST method with CSRF token -->
												<form id="delete-form-<?php echo $dok_kec->id ?>" action="<?php echo site_url('admin/dip/delete/'.$dok_kec->id) ?>" method="post" style="display:inline;">
													<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
													<button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) document.getElementById('delete-form-<?php echo $dok_kec->id ?>').submit();" class="btn btn-danger btn-xs" title="Hapus Informasi">
														<i class="fa fa-trash-o"></i> Hapus
													</button>
												</form>
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

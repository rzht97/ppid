<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/dokumen/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Judul</th>
										<th>Dokumen</th>
										<th>Description</th>
										<th>Kategori</th>
										<th>Tanggal</th>
										<th>User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dokumen as $dok_kec): ?>
									<tr>
										<td width="150">
											<?php echo $dok_kec->judul ?>
										</td>
										
										<td>
											<?php if ($dok_kec->image != "") { ?>
                                                                <a href="<?php echo base_url().'index.php/admin/dokumen/download/'.$dok_kec->id; ?>" class="fas fa-download"><span class="glyphicon glyphicon-download-alt">download</span></a>
                                                            <?php } else {
                                                                echo "belum di upload";
                                                            } ?>
										</td>
										<td class="small">
											<?php echo substr($dok_kec->description, 0, 120) ?>...</td>

										<td>
											<?php echo $dok_kec->kategori ?>
										</td>
										<td>
											<?php echo $dok_kec->tanggal ?>
										</td>
										<td>
											<?php echo $dok_kec->user ?>
										</td>
										<td width="250">
											
											<a onclick="deleteConfirm('<?php echo site_url('admin/dokumen/delete/'.$dok_kec->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>

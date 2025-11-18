<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("user/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("user/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("user/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("user/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('user/informasi/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Jenis</th>
										<th>Tanggal</th>
										<th>Description</th>
										<th>Status</th>
										<th>Jawaban</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($info as $berita_kec): ?>
									<tr>
										<td width="150">
											<?php echo $berita_kec->judul ?>
										</td>
										<td>
											<?php echo $berita_kec->tanggal ?>
										</td>
										<td class="small">
											<?php echo substr($berita_kec->deskripsi, 0, 120) ?>...
										</td>
										<td>
											<?php echo $berita_kec->status ?>
										</td>
										<td>
											<?php echo $berita_kec->jawab ?>
										</td>

										
										<td width="250">
											<a href="<?php echo site_url('user/informasi/detail/'.$berita_kec->informasi_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i>Detail</a>
											<a onclick="deleteConfirm('<?php echo site_url('user/informasi/delete/'.$berita_kec->informasi_id) ?>')"
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

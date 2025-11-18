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
				
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Jenis</th>
										<th>Status</th>
										<th>Jawab</th>
										<th>Pengaju</th>
									
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($berita as $berita_kec): ?>
									<tr>
										<td width="150">
											<?php echo $berita_kec->judul ?>
										</td>
										<td>
											<?php echo $berita_kec->status ?>
										</td>
										<td>
											<?php echo $berita_kec->jawab ?>
										</td>
										<td>
											<?php echo $berita_kec->pengaju ?>
										</td>
										
										<td width="250">
											<a href="<?php echo site_url('admin/info/edit/'.$berita_kec->informasi_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/info/delete/'.$berita_kec->informasi_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>

											 <!-- <a href="<?php echo base_url().'index.php/admin/berita/download/'.$berita_kec->berita_id; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt">download</a> -->
											

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

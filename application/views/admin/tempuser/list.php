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
				<!-- 	<div class="card-header">
						<a href="<?php echo site_url('admin/berita/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div> -->
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NIK</th>
										<th>Password</th>
									
										<th>Nama</th>
										
										<th>Email</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $berita_kec): ?>
									<tr>
										<td width="150">
											<?php echo $berita_kec->username ?>
										</td>
										<td>
											<?php echo $berita_kec->password ?>
										</td>
										
										<td>
											<?php echo $berita_kec->nama ?>
										</td>
									
										<td>
											<?php echo $berita_kec->email ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/user/edit/'.$berita_kec->user_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i>detail</a>
										

											 

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

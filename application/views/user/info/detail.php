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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('user/informasi/list/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/berita/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<tbody>
									<tr>
										<th>Judul</th>
										<th>: <?php echo $berita->judul ?></th>
									</tr>
									<tr>
										<th>Pengaju</th>
										<th>: <?php echo $berita->pengaju ?></th>
									</tr>
									
									<tr>
										<th>Deskripsi</th>
										<th>: <?php echo $berita->deskripsi ?></th>
									</tr>
									<tr>
										<th>Status</th>
										<th>: <?php echo $berita->status ?></th>
									</tr>
									<tr>
										<th>Judul</th>
										<th>: <?php echo $berita->jawab ?></th>
									</tr>
								</tbody>
							</table>

							
						</form>

					</div>

					


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>

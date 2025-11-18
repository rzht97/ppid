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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/dokumen/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/dokumen/add') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="name">Dokumen*</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" /> tipe file: docx,doc,pdf,xlsx
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
						
								</div>


							<div class="form-group">
								<label for="judul">Judul*</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								 type="text" name="judul" placeholder="Judul Dokumen" />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>

						<div class="form-group">
								<label for="kategori">Kategori</label>
								<select class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>" name="kategori">
								<option value="">---pilih---</option>
								<option value="Berkala">Berkala</option>
								<option value="Setiap Saat">Setiap Saat</option>
								<option value="Serta Merta">Serta Merta</option>
								<option value="Ditolak">Penolakan</option>
								<option value="Keberatan">Keberatan</option>
								
								</select>
								
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>						

							<div class="form-group">
								<label for="name">Description*</label>
								<textarea class="ckeditor <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="Product description..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>



							



							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>

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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/info/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/info/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $berita->informasi_id?>" />

							<div class="form-group">
								<label for="name">Jenis</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								 type="text" name="judul" placeholder="Judul Berita" value="<?php echo $berita->judul ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>

							


							<div class="form-group">
								
								
								<input type="hidden" name="old_image" value="<?php echo $berita->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Description*</label>
								<textarea readonly class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="deskirpisn..."><?php echo $berita->deskripsi ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('desckripsi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tanggal*</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="text" name="tanggal" placeholder="" value="<?php echo $berita->tanggal ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengaju*</label>
								<input class="form-control <?php echo form_error('pengaju') ? 'is-invalid':'' ?>"
								 type="text" name="pengaju" placeholder="" value="<?php echo $berita->pengaju ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('pengaju') ?>
								</div>
							</div>

								<div class="form-group">
								
						 <a href="<?php echo base_url().'index.php/admin/info/download/'.$berita->informasi_id; ?>" class="fas fa-download"><span class="glyphicon glyphicon-download-alt">download Dokumen</a>
							</div>

							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" name="status" placeholder="status..."><?php echo $berita->status ?>
								<option value="<?php echo $berita->status ?>" placeholder="Product kategori..."><?php echo $berita->status ?></option>
								<option value="sedang diproses">sedang diproses</option>
								<option value="sudah diproses">sudah diproses</option>
								<option value="ditolak">ditolak</option>
								</select>
								
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>

						
							</div>

								<div class="form-group">
								<label for="name">Tanggapan</label>
								<textarea class="ckeditor <?php echo form_error('jawab') ? 'is-invalid':'' ?>"
								 type="text" name="jawab" placeholder="" value="<?php echo $berita->jawab ?>"  ></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('jawab') ?>
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

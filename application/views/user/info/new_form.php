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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('user/informasi/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('user/informasi/add') ?>" method="post" enctype="multipart/form-data" >
							
							<div class="form-group">
								<label for="judul">Jenis Pemohonan</label>
								<select class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>" name="judul">
								<option value="">---pilih---</option>
								<option value="informasi">informasi</option>
								<option value="keberatan">keberatan</option>
								
								
								</select>
							</div>


							<div class="form-group">
								<label for="name">Dokumen</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Rincian Informasi Yang Dibutuhkan*</label>
								<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="deskripsi"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('deskripsi') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Tujuan Penggunaan Informasi*</label>
								<textarea class="form-control <?php echo form_error('tujuan') ? 'is-invalid':'' ?>"
								 name="tujuan" placeholder="Tujuan"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('tujuan') ?>
								</div>
							</div>
							
							<div class="form-group">
                                <label for="rincian_informasi_yang_dibutuhkan">Cara Memperoleh Informasi</label>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="caraperoleh" id="caraperoleh" required value="Melihat/Membaca/Mendengarkan/Mencatat" checked>
                                     Melihat/Membaca/Mendengarkan/Mencatat
                                </label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="caraperoleh" id="caraperoleh" value="Mendapat Salinan Informasi (Hard/Soft Copy)" checked>
                                     Mendapat Salinan Informasi (Hard/Soft Copy)
                                </label>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label for="rincian_informasi_yang_dibutuhkan">Cara Mendapat Salinan Informasi</label>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="caradapatsalinan" id="caradapatsalinan" required value="Mengambil Langsung" checked>
                                     Mengambil Langsung
                                </label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="caradapatsalinan" id="caradapatsalinan" value="E-mail" checked>
                                     E-mail
                                </label>
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
				<?php $this->load->view("user/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("user/_partials/scrolltop.php") ?>

		<?php $this->load->view("user/_partials/js.php") ?>

</body>

</html>

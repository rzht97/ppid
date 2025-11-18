<!DOCTYPE html>
<html lang="en">

<head>

 


      <?php $this->load->view("publik/_partials/head.php") ?>

   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
 <?php $this->load->view("publik/_partials/banner.php") ?>

</head>



		<div id="content-wrapper">

			<div >

			

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?> 

				<div class="card mb-3">
					
					<div class="card-body">

						<form action="<?php echo base_url('index.php/publik/login/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="row">
							 <div class="col-lg-6 mb-5 mb-lg-0">
							 <div class="blog_left_sidebar">

						

							<div class="form-group">
								<label for="judul">Nama</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="Nama Seusai KTP" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

					
							<div class="form-group">
								<label for="judul">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Alamat Susuai KTP" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>					

						
							<div class="form-group">
								<label for="judul">Tanggal Lahir</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Tanggal Lahir" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="judul">Pekerjaan</label>
								<input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan" placeholder="Sesuai KTP" />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="judul">Alamat EMail</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" placeholder="email" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
			</div>
		</div>
				<div class="col-lg-4 mb-5 mb-lg-">
							<div class="form-group">
								<label for="judul">NIK</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="NIK" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="judul">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="Password" name="password" placeholder="Password" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

						

							<div class="form-group">
								<label>KTP*</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" /> tipe file: jpg,jpeg,png
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
						
								</div>
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
								
						</form>

					</div>
</div>
					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
			

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>

</body>

</html>

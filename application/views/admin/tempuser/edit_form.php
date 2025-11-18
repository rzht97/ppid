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

						<a href="<?php echo site_url('admin/berita/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo base_url("index.php/admin/user/update") ?>" method="post"
							enctype="multipart/form-data" >

						<div class="row">
							 <div class="col-lg-6 mb-5 mb-lg-0">
							 <div class="blog_left_sidebar">

								<input type="hidden" name="user_id" value="<?php echo $berita->user_id?>" />

							<div class="form-group">
								<label for="judul">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Seusai KTP" value="<?php echo $berita->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

					
							<div class="form-group">
								<label for="judul">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Alamat Susuai KTP" value="<?php echo $berita->alamat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>					

						
							<div class="form-group">
								<label for="judul">Tanggal Lahir</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Tanggal Lahir" value="<?php echo $berita->tanggal ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="judul">Pekerjaan</label>
								<input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan" placeholder="Sesuai KTP" value="<?php echo $berita->pekerjaan ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="judul">Alamat EMail</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" placeholder="email" value="<?php echo $berita->email ?>" />
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
								 type="text" name="username" placeholder="username" value="<?php echo $berita->username ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="judul">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="Password" name="password" placeholder="Password" value="<?php echo $berita->password ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

						

							<div class="form-group">
								<label for="name">KTP*</label>
								<br></br>
								<input type="hidden" name="image" value="<?php echo $berita->image?>" />
								<img src="<?php echo base_url('upload/ktp/'.$berita->image) ?>" width="200"  />
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
								
					</from>
				
					</div>
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

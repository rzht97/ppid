<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Pengguna Baru - PPID Kab. Sumedang</title>
  <?php $this->load->view('dev/user/partials/head.php')?>

</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <section id="wrapper" class="login-register">
    <div class="login-box">
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <?php if ($this->session->flashdata('success')) : ?>
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <form action="<?php echo base_url('index.php/pub/login/add') ?>" method="post" enctype="multipart/form-data">
              <h3 class="box-title m-b-20">Daftar Pengguna</h3>

              <div class="form-group ">
                <label>NIK (digunakan sebagai username)</label>
                <div class="col-xs-12">
                  <input class="form-control<?php echo form_error('username') ? 'is-invalid' : '' ?>" 
						 type="text" name="username" placeholder="NIK Sesuai KTP" required>
                </div>
              </div>

              <div class="form-group ">
                <label>Nama</label>
                <div class="col-xs-12">
                  <input class="form-control<?php echo form_error('nama') ? 'is-invalid' : '' ?>" 
						 type="text" name="nama" placeholder="Nama" required>
                </div>
              </div>

              <div class="form-group ">
                <label>Alamat</label>
                <div class="col-xs-12">
                  <input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="Alamat Lengkap" required>
                </div>
              </div>

              <div class="form-group ">
                <label>Tanggal Lahir</label>
                <div class="col-xs-12">
                  <input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" type="date" name="tanggal" placeholder="Tanggal Lahir" required>
                </div>
              </div>

              <div class="form-group ">
                <label>Pekerjaan</label>
                <div class="col-xs-12">
                  <input class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?>" type="text" name="pekerjaan" placeholder="Pekerjaan">
                </div>
              </div>

              <div class="form-group ">
                <label>Alamat E-mail</label>
                <div class="col-xs-12">
                  <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="email" required>
                </div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <div class="col-xs-12">
                  <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password" required="" placeholder="Password">
                </div>
              </div>

              <!-- <div class="form-group">
                <label>File upload</label>
                <div class="col-xs-12">
                  <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                      <input type="file" name="image">
                    </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
              </div> -->

              <div class="form-group">
								<label>KTP</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" required/> tipe file: jpg,jpeg,png
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
						
								</div>
							</div>

              <div class="form-group">
                <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <input class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="btn" value="Sign Up"/>
                  </div>
                </div>
              </div>

              <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                  <p>Sudah Punya Akun? <a href="https://ppid.sumedangkab.go.id/index.php/pub/login/" class="text-primary m-l-5"><b>Sign In</b></a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('dev/user/partials/js.php')?>
</body>

</html>
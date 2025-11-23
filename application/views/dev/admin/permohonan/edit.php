<!DOCTYPE html>
<html lang="en">

<head>
	<title>Permohonan Informasi - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px;">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="d-none d-sm-inline"><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left d-none d-sm-inline">
                    <li><a href="javascript:void(0)" class="open-close d-none d-sm-inline waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right float-right"></ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <h4 class="page-title">Notifications</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12">
                        <a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger float-right m-l-20 btn-rounded btn-outline d-none d-sm-inline hidden-sm waves-effect waves-light">Buy Now</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Ui Elements</a></li>
                            <li class="active">Notifications</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Default Basic Forms</h3>
                            <p class="text-muted m-b-30 font-13"> All bootstrap element classies </p>
                            <form class="form-horizontal" action="<?php base_url(" admin/info/edit") ?>" method="post"
							enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo html_escape($berita->informasi_id)?>" />
								<!-- FIX HIGH: Add CSRF token -->
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                <div class="form-group">
								<label for="name">Jenis</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								 type="text" name="judul" placeholder="Judul Berita" value="<?php echo html_escape($berita->judul) ?>" readonly />
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
								 name="deskripsi" placeholder="deskirpisn..."><?php echo html_escape($berita->deskripsi) ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('desckripsi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tanggal*</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="text" name="tanggal" placeholder="" value="<?php echo html_escape($berita->tanggal) ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Pengaju*</label>
								<input class="form-control <?php echo form_error('pengaju') ? 'is-invalid':'' ?>"
								 type="text" name="pengaju" placeholder="" value="<?php echo html_escape($berita->pengaju) ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('pengaju') ?>
								</div>
							</div>

								<div class="form-group">
								
						 <a href="<?php echo base_url().'index.php/admin/info/download/'.$berita->informasi_id; ?>" class="fas fa-download"><span class="glyphicon glyphicon-download-alt">download Dokumen</span></a>
							</div>

							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" name="status" placeholder="status..."><?php echo html_escape($berita->status) ?>
								<option value="<?php echo html_escape($berita->status) ?>" placeholder="Product kategori..."><?php echo html_escape($berita->status) ?></option>
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
								 type="text" name="jawab" placeholder="" value="<?php echo html_escape($berita->jawab) ?>"  ></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('jawab') ?>
								</div> 
								 
							</div>



							<input class="btn btn-success" type="submit" name="btn" value="Save" />                            
						   </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('dev/admin/partials/js.php')?>
</body>
	
    <script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</html>

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
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px; padding: 0 15px; display: flex; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <!-- Left: Logo + Toggle -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <!-- Compact Logo -->
                <a href="<?= site_url('admin/index') ?>" style="display: flex; align-items: center; text-decoration: none;">
                    <img src="<?= base_url()?>inverse/plugins/images/pixeladmin-logo.png" alt="PPID" style="height: 35px; width: auto;">
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #333; display: none;" class="d-md-inline">
                        PPID Kab. Sumedang
                    </span>
                </a>
                <!-- Sidebar Toggle -->
                <a href="javascript:void(0)" class="open-close waves-effect waves-light" style="padding: 8px 10px; color: #555; font-size: 18px; margin-left: 5px;">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/admin/partials/sidebar.php')?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title" style="padding: 10px 0; margin-bottom: 20px;">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <h4 class="page-title" style="margin: 0;">Edit Permohonan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12 text-right">
                        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0; display: inline-block;">
                            <li style="display: inline; color: #666;">
                                <a href="<?= site_url('admin/index') ?>" style="color: #5b9bd1;">Admin</a>
                                <span style="margin: 0 8px; color: #999;">/</span>
                            </li>
                            <li style="display: inline; color: #666;">
                                <a href="<?= site_url('admin/permohonan') ?>" style="color: #5b9bd1;">Permohonan</a>
                                <span style="margin: 0 8px; color: #999;">/</span>
                            </li>
                            <li style="display: inline; color: #333; font-weight: 500;">Edit</li>
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

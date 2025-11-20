<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Informasi Publik - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url()?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right"></ul>
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Informasi Publik</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="<?php echo site_url('admin/dip') ?>">Daftar Informasi</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Edit Informasi Publik</h3>
                            <br>

                            <?php
                                // Read flashdata and target page
                                $success_msg = $this->session->flashdata('success');
                                $success_target = $this->session->flashdata('success_target');
                                $error_msg = $this->session->flashdata('error');
                                $error_target = $this->session->flashdata('error_target');
                                $validation_errors = validation_errors();

                                // Get current page URI
                                $current_uri = uri_string();

                                // Only show alert if no target specified OR target matches current page
                                $show_success = $success_msg && (!$success_target || $success_target === $current_uri);
                                $show_error = $error_msg && (!$error_target || $error_target === $current_uri);
                            ?>
                            <?php if($show_success): ?>
                                <div class="alert alert-success alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-check-circle"></i> <?php echo $success_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($show_error): ?>
                                <div class="alert alert-danger alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-times-circle"></i> <?php echo $error_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($validation_errors): ?>
                                <div class="alert alert-warning alert-dismissible auto-close-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian!</strong> Mohon perbaiki kesalahan berikut:
                                    <?php echo $validation_errors; ?>
                                </div>
                            <?php endif; ?>

                            <form class="form-horizontal" action="<?php echo site_url('admin/dip/edit/'.$dokumen->id) ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $dokumen->id ?>" />

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Ringkasan Isi Informasi <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control <?php echo form_error('judul') ? 'is-invalid' : '' ?>" name="judul" placeholder="Masukkan ringkasan isi informasi" value="<?php echo set_value('judul', $dokumen->judul); ?>">
                                        <?php if(form_error('judul')): ?>
                                            <div class="text-danger"><?php echo form_error('judul'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12"><strong>Kategori <span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('kategori') ? 'is-invalid' : '' ?>" name="kategori">
                                            <option value="">-- Pilih Kategori --</option>
                                    		<option value="Berkala" <?php echo set_select('kategori', 'Berkala', $dokumen->kategori == 'Berkala'); ?>>Berkala</option>
                                   			<option value="Setiap Saat" <?php echo set_select('kategori', 'Setiap Saat', $dokumen->kategori == 'Setiap Saat'); ?>>Setiap Saat</option>
                                    		<option value="Serta Merta" <?php echo set_select('kategori', 'Serta Merta', $dokumen->kategori == 'Serta Merta'); ?>>Serta Merta</option>
                                        </select>
                                        <?php if(form_error('kategori')): ?>
                                            <div class="text-danger"><?php echo form_error('kategori'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-12"><strong>Bentuk Informasi Yang Tersedia</strong></label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('bentukinfo') ? 'is-invalid' : '' ?>" name="bentukinfo">
                                            <option value="">-- Pilih Bentuk Informasi --</option>
                                    		<option value="Hard Copy" <?php echo set_select('bentukinfo', 'Hard Copy', $dokumen->bentukinfo == 'Hard Copy'); ?>>Hardcopy</option>
                                   			<option value="Soft Copy" <?php echo set_select('bentukinfo', 'Soft Copy', $dokumen->bentukinfo == 'Soft Copy'); ?>>Softcopy</option>
                                    		<option value="Hard & Soft Copy" <?php echo set_select('bentukinfo', 'Hard & Soft Copy', $dokumen->bentukinfo == 'Hard & Soft Copy'); ?>>Hard & Soft Copy</option>
											<option value="Sosial Media" <?php echo set_select('bentukinfo', 'Sosial Media', $dokumen->bentukinfo == 'Sosial Media'); ?>>Sosial Media</option>
											<option value="Website" <?php echo set_select('bentukinfo', 'Website', $dokumen->bentukinfo == 'Website'); ?>>Website</option>
                                        </select>
                                        <?php if(form_error('bentukinfo')): ?>
                                            <div class="text-danger"><?php echo form_error('bentukinfo'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-12"><strong>Jangka Waktu Penyimpanan</strong></label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('jangkawaktu') ? 'is-invalid' : '' ?>" name="jangkawaktu">
                                            <option value="">-- Pilih Jangka Waktu --</option>
                                    		<option value="1 Tahun" <?php echo set_select('jangkawaktu', '1 Tahun', $dokumen->jangkawaktu == '1 Tahun'); ?>>1 Tahun</option>
                                    		<option value="5 Tahun" <?php echo set_select('jangkawaktu', '5 Tahun', $dokumen->jangkawaktu == '5 Tahun'); ?>>5 Tahun</option>
                                    		<option value="Selama Berlaku" <?php echo set_select('jangkawaktu', 'Selama Berlaku', $dokumen->jangkawaktu == 'Selama Berlaku'); ?>>Selama Berlaku</option>
                                        </select>
                                        <?php if(form_error('jangkawaktu')): ?>
                                            <div class="text-danger"><?php echo form_error('jangkawaktu'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12"><strong>Upload Dokumen</strong></label>
                                    <div class="col-sm-12">
                                        <?php if($dokumen->image != "Belum Tersedia"): ?>
                                            <div class="alert alert-info">
                                                <i class="fa fa-file"></i> Dokumen saat ini: <strong><?php echo $dokumen->image ?></strong>
                                                <a href="<?php echo base_url().'index.php/admin/dip/download/'.$dokumen->id; ?>" class="btn btn-xs btn-success pull-right">
                                                    <i class="fa fa-download"></i> Download
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Pilih File</span>
                                                <span class="fileinput-exists">Ganti</span>
                                                <input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                        </div>
                                        <?php if(form_error('image')): ?>
                                            <div class="text-danger"><?php echo form_error('image'); ?></div>
                                        <?php endif; ?>
                                        <span class="help-block"><small>Upload file dokumen baru dalam format PDF, DOC, atau DOCX (Maksimal 5MB). Kosongkan jika tidak ingin mengubah dokumen.</small></span>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-12"><strong>Sumber Data / Keterangan</strong></label>
                                    <div class="col-sm-12">
                                        <input class="form-control <?php echo form_error('sumberdata') ? 'is-invalid' : '' ?>" type="text" name="sumberdata" placeholder="Contoh: Website Resmi, Media Sosial, dll" value="<?php echo set_value('sumberdata', $dokumen->sumberdata); ?>" />
                                        <?php if(form_error('sumberdata')): ?>
                                            <div class="text-danger"><?php echo form_error('sumberdata'); ?></div>
                                        <?php endif; ?>
                                        <span class="help-block"><small>Isi field ini jika dokumen tidak di-upload (tersedia di media lain)</small></span>
                                    </div>
                            	</div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="btn" class="btn btn-success waves-effect waves-light">
                                                <i class="fa fa-save"></i> Perbarui Informasi
                                            </button>
                                            <a href="<?php echo site_url('admin/dip') ?>" class="btn btn-default waves-effect waves-light">
                                                <i class="fa fa-times"></i> Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2022, Diskominfosanditik Kab. Sumedang as PPID </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('dev/admin/partials/js.php')?>
</body>

<script>
    // Auto-close alerts after 5 seconds
    $(document).ready(function() {
        setTimeout(function() {
            $('.auto-close-alert').fadeOut('slow', function() {
                $(this).alert('close');
            });
        }, 5000); // 5000ms = 5 seconds
    });
</script>

</html>

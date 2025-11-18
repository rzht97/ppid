<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tambah Informasi - Admin PPID Kab. Sumedang</title>
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
                        <h4 class="page-title">Tambah Dokumen</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">DIP</a></li>
                            <li class="active">Tambah</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Tambah Informasi</h3>
                            <form class="form-horizontal" action="<?php base_url("admin/dokumen/edit") ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?php echo $dokumen->id ?>" />
								
                                <div class="form-group">
                                    <label class="col-md-12">Deskripsi Isi Informasi</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control <?php echo form_error('judul') ? 'is-invalid' : '' ?>" name = "judul" value="<?php echo $dokumen->judul ?>">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-sm-12">Kategori</label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('kategori') ? 'is-invalid' : '' ?>" name="kategori" value="<?php echo $dokumen->kategori ?>">
                                            <option value="">---pilih---</option>
                                    		<option value="Berkala">Berkala</option>
                                   			<option value="Setiap Saat">Setiap Saat</option>
                                    		<option value="Serta Merta">Serta Merta</option>
                                        </select>
                                    </div>
									<div class="invalid-feedback">
                                    	<?php echo form_error('kategori') ?>
                                	</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12">Bentuk Informasi Yang Tersedia</label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('bentukinfo') ? 'is-invalid' : '' ?>" name="bentukinfo" value="<?php echo $dokumen->bentukinfo ?>">
                                            <option value="">---pilih---</option>
                                    		<option value="Hard Copy">Hardcopy</option>
                                   			<option value="Soft Copy">Softcopy</option>
                                    		<option value="Hard & Soft Copy">Hard & Soft Copy</option>
											<option value="Sosial Media">Sosial Media</option>
											<option value="Website">Website</option>
                                        </select>
                                    </div>
									<div class="invalid-feedback">
                                    	<?php echo form_error('bentukinfo') ?>
                                	</div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12">Jangka Waktu Penyimpanan</label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('jangkawaktu') ? 'is-invalid' : '' ?>" name="jangkawaktu" required>
                                            <option value="">---pilih---</option>
                                    		<option value="1 Tahun">1 Tahun</option>
                                    		<option value="5 Tahun">5 Tahun</option>
                                    		<option value="Selama Berlaku">Selama Berlaku</option>
                                        </select>
                                    </div>
									<div class="invalid-feedback">
                                    	<?php echo form_error('bentukinfo') ?>
                                	</div>
                                </div>
								
                                <div class="form-group">
                                    <label class="col-sm-12">Sumber Dokumen</label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image">
                                            </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
									<div class="invalid-feedback">
                                    	<?php echo form_error('image') ?>
                                	</div>
									<span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
                                </div>
								
								<div class="form-group">
                                	<input class="form-control <?php echo form_error('sumberdata') ? 'is-invalid' : '' ?>" type="text" name="sumberdata" placeholder="sumber Dokumen" />
                                	<div class="invalid-feedback">
                                    	<?php echo form_error('sumberdata') ?>
                                	</div>
                            	</div>
								
								<button type="submit" name ="btn" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
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

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>buat permohonan - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/user/partials/head.php')?>
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <?php $this->load->view('dev/user/partials/topnav.php')?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <?php $this->load->view('dev/user/partials/navbar.php')?>
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
                            <h3 class="box-title m-b-0">Buat Permohonan</h3>
                            <form class="form-horizontal" action="<?php base_url('user/informasi/add') ?>" method="post" enctype="multipart/form-data">
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
									<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"type="file" name="image" />
									<div class="invalid-feedback">
										<?php echo form_error('image') ?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="name">Rincian Informasi Yang Dibutuhkan*</label>
									<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>" name="deskripsi" placeholder="deskripsi"></textarea>
									<div class="invalid-feedback">
										<?php echo form_error('deskripsi') ?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="name">Tujuan Penggunaan Informasi*</label>
									<textarea class="form-control <?php echo form_error('tujuan') ? 'is-invalid':'' ?>"name="tujuan" placeholder="Tujuan"></textarea>
									<div class="invalid-feedback">
										<?php echo form_error('tujuan') ?>
									</div>
								</div>
								
                                <div class="form-group">
                                	<label for="rincian_informasi_yang_dibutuhkan">Cara Memperoleh Informasi</label>
                                	<div class="form-check">
                                		<label class="form-check-label">
                                    		<input class="form-check-input" type="radio" name="caraperoleh" id="caraperoleh" required value="Melihat/Membaca/Mendengarkan/Mencatat" checked>Melihat/Membaca/Mendengarkan/Mencatat
                                		</label>
                                	</div>
                                	<div class="form-check">
                                		<label class="form-check-label">
                                    		<input class="form-check-input" type="radio" name="caraperoleh" id="caraperoleh" value="Mendapat Salinan Informasi (Hard/Soft Copy)" checked>Mendapat Salinan Informasi (Hard/Soft Copy)
                                		</label>
                                	</div>
                            	</div>
								
								<div class="form-group">
                                	<label for="rincian_informasi_yang_dibutuhkan">Cara Mendapat Salinan Informasi</label>
                                	<div class="form-check">
                                		<label class="form-check-label">
                                    		<input class="form-check-input" type="radio" name="caradapatsalinan" id="caradapatsalinan" required value="Mengambil Langsung" checked>Mengambil Langsung
                                		</label>
                                	</div>
                                	<div class="form-check">
                                		<label class="form-check-label">
                                    		<input class="form-check-input" type="radio" name="caradapatsalinan" id="caradapatsalinan" value="E-mail" checked> E-mail
                                		</label>
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
    <?php $this->load->view('dev/user/partials/js.php')?>
    <!-- end - This is for export functionality only -->
    
    <!--Style Switcher -->
    <script src="<?= base_url(); ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
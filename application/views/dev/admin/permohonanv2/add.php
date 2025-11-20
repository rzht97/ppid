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
                        <h4 class="page-title">Permohonan Informasi</h4>
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
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Daftar Permohonan Informasi</h3>
							<br>
							<form  data-toogle = "validator" class="form-horizontal" action="<?php base_url('pub/permohonan/permohonan') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Nama</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('nama') ? 'is-invalid' : '' ?> name = "nama" placeholder="Nama" required>
										<div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Pekerjaan</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?> name = "pekerjaan" placeholder="Pekerjaan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('alamat') ? 'is-invalid' : '' ?> name = "alamat" placeholder="Alamat" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nomor Telepon</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('nohp') ? 'is-invalid' : '' ?> name = "nohp" placeholder="No Telepon" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">email</label>
                                    <div class="col-md-12">
                                        <input type="email" id="email" <?php echo form_error('email') ? 'is-invalid' : '' ?> name = "email"  class="form-control"  placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Rincian Informasi</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" <?php echo form_error('rincian') ? 'is-invalid' : '' ?> name = "rincian" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Tujuan Penggunaan Informasi</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" <?php echo form_error('tujuan') ? 'is-invalid' : '' ?> name = "tujuan" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Cara Memperoleh Informasi</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" <?php echo form_error('caraperoleh') ? 'is-invalid' : '' ?> name = "caraperoleh">
											<option value="" Hidden></option>
											<option value = "Mendapat Salinan informasi (hardcopy/softcopy)" >Mendapat Salinan informasi (hardcopy/softcopy)</option>
                                            <option value = "Melihat/membaca/mendengarkan/mecatat">Melihat/membaca/ mendengarkan/mecatat</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Cara Mendapat Salinan Informasi</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" <?php echo form_error('caradapat') ? 'is-invalid' : '' ?> name = "caradapat">
											<option value="" Hidden></option>
                                            <option value = "Mengambil Langsung">Mengambil Langsung</option>
                                            <option value = "Kurir">Kurir</option>
                                            <option value = "Pos">Pos</option>
                                            <option value = "faksimil">faksimil</option>
                                            <option value = "E-mail">E-mail</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Upload Foto KTP</label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input class="form-control-file <?php echo form_error('ktp') ? 'is-invalid' : '' ?>" type="file" name="ktp" required>
                                            </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a></div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                            
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
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</html>

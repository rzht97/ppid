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
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Daftar Informasi Publik</h3>
							<br>
							<div class="card-header">
								<a href="<?php echo site_url('admin/dokumen/add') ?>" class="fcbtn btn btn-outline btn-success btn-1b"><i class="fa fa-plus"></i> Add New</a>
							</div>
							<br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
										<tr>
											<th>Ringkasan Isi Informasi</th>
											<th>Waktu Pembuatan/Penerbitan Informasi</th>
											<th>Jenis Informasi</th>
											<th>Bentuk Informasi Yang Tersedia</th>
											<th>Jangka Waktu Penyimpanan</th>
											<th>Dokumen</th>
											<th>Action</th>
										</tr>
									</thead>
                                    <tbody>
									<?php foreach ($dokumen as $dok_kec): ?>
									<tr>
										<td>
											<?php echo $dok_kec->judul ?>
										</td>
										<td>
											<?php echo $dok_kec->tanggal ?>
										</td>
										<td>
											<?php echo $dok_kec->kategori ?>
										</td>
										<td>
											<?php echo $dok_kec->bentukinfo?>
										</td>
										<td>
											<?php echo $dok_kec->jangkawaktu?>
										</td>
										<td>
											<?php if ($dok_kec->image != "Belum Tersedia") { ?>
                                                                <a href="<?php echo base_url().'index.php/admin/dokumen/download/'.$dok_kec->id; ?>" class="fcbtn btn btn-outline btn-success btn-1b"><span class="fa fa-download">download</span></a>
                                                            <?php } else {
                                                                echo $dok_kec->sumberdata;
                                                            } ?>
										</td>
										<td>
											<a href="<?php echo site_url('admin/dokumen/edit/' . $dok_kec->id) ?>" class="fcbtn btn btn-outline btn-warning btn-1b"><i class="fa fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/dokumen/delete/'.$dok_kec->id) ?>')"
											 href="#!" class="fcbtn btn btn-outline btn-danger btn-1b"><i class="fa fa-trash-o"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
                                </table>
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
	<?php $this->load->view('dev/admin/partials/modal.php')?>
</body>
	
    <script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</html>

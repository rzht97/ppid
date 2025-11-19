<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar Informasi Publik - Admin PPID Kab. Sumedang</title>
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
                        <h4 class="page-title">Daftar Informasi Publik</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Daftar Informasi</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Daftar Informasi Publik</h3>
							<br>

							<?php if($this->session->flashdata('success')): ?>
								<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
								</div>
							<?php endif; ?>

							<?php if($this->session->flashdata('error')): ?>
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php endif; ?>

							<div class="card-header">
								<a href="<?php echo site_url('admin/dip/add') ?>" class="fcbtn btn btn-outline btn-success btn-1b"><i class="fa fa-plus"></i> Tambah Informasi</a>
							</div>
							<br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <thead class="bg-light">
										<tr>
											<th width="40" class="text-center">No</th>
											<th>Ringkasan Isi Informasi</th>
											<th width="100" class="text-center">Tanggal</th>
											<th width="180">Kategori</th>
											<th width="150">Bentuk Informasi</th>
											<th width="150" class="text-center">Jangka Waktu Penyimpanan</th>
											<th width="90" class="text-center">Dokumen</th>
											<th width="160" class="text-center">Aksi</th>
										</tr>
									</thead>
                                    <tbody>
									<?php $no = 1; ?>
									<?php foreach ($dokumen as $dok_kec): ?>
									<tr>
										<td class="text-center" style="vertical-align: middle;"><?php echo $no++; ?></td>
										<td style="vertical-align: middle;">
											<strong><?php echo $dok_kec->judul ?></strong>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<small><?php echo $dok_kec->tanggal ?></small>
										</td>
										<td style="vertical-align: middle;">
											<span class="label label-primary" style="font-size: 11px; padding: 5px 10px;">
												<?php echo $dok_kec->kategori ?>
											</span>
										</td>
										<td style="vertical-align: middle;">
											<small><?php echo $dok_kec->bentukinfo?></small>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<small><?php echo $dok_kec->jangkawaktu?></small>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<?php if ($dok_kec->image != "Belum Tersedia") { ?>
												<a href="<?php echo base_url().'index.php/admin/dip/download/'.$dok_kec->id; ?>" class="btn btn-success btn-xs" title="Download Dokumen">
													<i class="fa fa-download"></i> Download
												</a>
											<?php } else { ?>
												<span class="label label-default" style="font-size: 10px;">
													<?php echo $dok_kec->sumberdata; ?>
												</span>
											<?php } ?>
										</td>
										<td class="text-center" style="vertical-align: middle;">
											<div class="btn-group" role="group">
												<a href="<?php echo site_url('admin/dip/edit/' . $dok_kec->id) ?>" class="btn btn-warning btn-xs" title="Edit Informasi">
													<i class="fa fa-edit"></i> Edit
												</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/dip/delete/'.$dok_kec->id) ?>')" href="#!" class="btn btn-danger btn-xs" title="Hapus Informasi">
													<i class="fa fa-trash-o"></i> Hapus
												</a>
											</div>
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

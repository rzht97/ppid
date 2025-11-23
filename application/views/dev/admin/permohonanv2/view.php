<!DOCTYPE html>
<html lang="en">

<head>
	<title>Permohonan Informasi - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php')?>
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                <div class="row bg-title" style="padding: 10px 0; margin-bottom: 20px;">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <h4 class="page-title" style="margin: 0;">Permohonan Informasi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-12 text-right">
                        <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0; display: inline-block;">
                            <li style="display: inline; color: #666;">
                                <a href="<?= site_url('admin/index') ?>" style="color: #5b9bd1;">Admin</a>
                                <span style="margin: 0 8px; color: #999;">/</span>
                            </li>
                            <li style="display: inline; color: #333; font-weight: 500;">Permohonan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Daftar Permohonan Informasi</h3>
							<br>
							<div class="card-header">
								<a href="<?php echo site_url('admin/permohonan/add') ?>" class="fcbtn btn btn-outline btn-success btn-1b"><i class="fa fa-plus"></i> Add New</a>
							</div>
							<br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>tanggal</th>
                                            <th>nama</th>
                                            <th>pekerjaan</th>
											<th>kontak</th>
                                            <th>KTP</th>
											<th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($permohonan as $data) : ?>
                                            <tr>
                                                <td width="150">
                                                    <?php echo html_escape($data->tanggal) ?>
                                                </td>
                                                <td>
                                                    <?php echo html_escape($data->nama) ?>
                                                </td>
                                                <td>
                                                    <?php echo html_escape($data->pekerjaan) ?>
                                                </td>
												<td>
                                                    <?php echo html_escape($data->nohp) ?> / <?php echo html_escape($data->email)?>
                                                </td>
												<td>
                                                    <?php echo html_escape($data->ktp) ?>
                                                </td>
												<td>
                                                    <?php echo html_escape($data->status) ?>
                                                </td>

                                                <td width="250">
													<?php if($data->status == "Menunggu Verifikasi"):?>
                            							<a href = '<?php echo site_url('admin/permohonan/verifikasi/'.$data->mohon_id)?>'><button type="button" class="fcbtn btn btn-info btn-outline btn-1b" style = "width:100px">Verifikasi </button></a>
													<?php elseif ($data->status == "Sedang Diproses" ):?>
														<button class="fcbtn btn btn-warning btn-outline btn-1b" data-toggle="modal" data-target="#exampleModal2" style = "width:100px">Proses</button>
													<?php else:?>
														<button class="fcbtn btn btn-success btn-outline btn-1b" data-toggle="modal" data-target="#exampleModal1" style = "width:100px">Lihat</button>
													<?php endif?>
													<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Detail Permohonan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form data-toogle="validator" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal Permohonan:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->tanggal) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												<?php if($data->tanggaljawab != ''):?>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Permohonan Selesai:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->tanggaljawab) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												<?php endif?>
                                            </div>
                                            <h3 class="box-title">Permohonan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Rincian Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->rincian) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tujuan Penggunaan Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->tujuan) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Cara Memperoleh Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->caraperoleh) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Cara Mendapatkan Salinan Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->caradapat) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Status :</label>
                                                <div class="col-md-3">
                                                    <?php if ($data->status == 'Menunggu Verifikasi') : ?>
                                                        <button class="btn btn-block btn-warning disabled"><?php echo html_escape($data->status) ?> </button>
                                                    <?php elseif ($data->status == 'Sedang Diproses') : ?>
                                                        <button class="btn btn-block btn-info disabled"><?php echo html_escape($data->status) ?> </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-block btn-success disabled"><?php echo html_escape($data->status) ?></button>
                                                    <?php endif ?>
                                                </div>
                                            </div>
											<div class="form-group">
                                                  <label class="control-label">Jawaban :</label>
                                                  <div class="col-md-9">
                                                       <p class="form-control-static"> <?php echo html_escape($data->jawab) ?> </p>
                                                  </div>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Detail Permohonan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form data-toogle="validator" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tanggal Permohonan:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->tanggal) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												<?php if($data->tanggaljawab != ''):?>
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Permohonan Selesai:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->tanggaljawab) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												<?php endif?>
                                            </div>
                                            <h3 class="box-title">Permohonan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Rincian Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->rincian) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tujuan Penggunaan Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->tujuan) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Cara Memperoleh Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->caraperoleh) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Cara Mendapatkan Salinan Informasi :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?php echo html_escape($data->caradapat) ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Status :</label>
                                                <div class="col-md-3">
                                                    <?php if ($data->status == 'Menunggu Verifikasi') : ?>
                                                        <button class="btn btn-block btn-warning disabled"><?php echo html_escape($data->status) ?> </button>
                                                    <?php elseif ($data->status == 'Sedang Diproses') : ?>
                                                        <button class="btn btn-block btn-info disabled"><?php echo html_escape($data->status) ?> </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-block btn-success disabled"><?php echo html_escape($data->status) ?></button>
                                                    <?php endif ?>
                                                </div>
                                            </div>
											<div class="form-group">
                                                  <label class="control-label">Jawaban :</label>
                                                  <div class="col-md-9">
                                                       <p class="form-control-static"> <?php echo html_escape($data->jawab) ?> </p>
                                                  </div>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
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
</body>
	
    <script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</html>

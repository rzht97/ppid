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
        <nav class="navbar navbar-light bg-white navbar-static-top m-b-0" style="min-height: 60px; height: 60px; padding: 0 15px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
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

            <!-- Right: User Actions -->
            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="<?= site_url('admin/index') ?>" class="waves-effect" style="padding: 6px 12px; color: #666; font-size: 14px; text-decoration: none; border-radius: 4px;" title="Dashboard">
                    <i class="fa fa-home"></i>
                    <span class="d-none d-lg-inline" style="margin-left: 5px;">Dashboard</span>
                </a>
                <a href="<?= base_url('index.php/login/logout') ?>" class="waves-effect" style="padding: 6px 12px; color: #fff; background: #d9534f; font-size: 14px; text-decoration: none; border-radius: 4px;" title="Logout">
                    <i class="fa fa-power-off"></i>
                    <span class="d-none d-lg-inline" style="margin-left: 5px;">Logout</span>
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

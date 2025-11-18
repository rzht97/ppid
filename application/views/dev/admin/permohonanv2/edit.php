<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Informasi - Admin PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/admin/partials/head.php') ?>
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
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text.png" alt="home" class="dark-logo" /><img src="<?= base_url() ?>/inverse/plugins/images/pixeladmin-text-dark.png" alt="home" class="light-logo" /></span></a></div>
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
        <?php $this->load->view('dev/admin/partials/sidebar.php') ?>
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
                            <h3 class="box-title m-b-0">Proses Permohonan Informasi</h3>
                            <form class="form-horizontal" action="<?php base_url("admin/permohonan/edit") ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="mohon_id" value="<?php echo $permohonan->mohon_id ?>" />
                                <div class="form-body">
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $permohonan->nama ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Pekerjaan</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $permohonan->pekerjaan ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Alamat</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $permohonan->alamat ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">No HP</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $permohonan->nohp ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">e-mail</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $permohonan->email ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">KTP</label>
                                                <div class="col-md-9">
                                                    <div class="col-md-4"> 
														<img src=<?php echo base_url("upload/ktp/").$permohonan->ktp ?> class="img-responsive thumbnail m-r-15"> 
													</div>
													<div id="image-popup">
                                                        <a href=<?php echo base_url("upload/ktp/").$permohonan->ktp ?> data-effect="mfp-zoom-in"><img src=<?php echo base_url("upload/ktp/").$permohonan->ktp ?> class="img-responsive" />
                                                            <br/>Zoom</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Rincian Informasi</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php echo $permohonan->rincian ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Tujuan Penggunaan Informasi</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php echo $permohonan->tujuan ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Memperoleh Informasi</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php echo $permohonan->caraperoleh ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Cara Mendapatkan Informasi</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"> <?php echo $permohonan->caradapat ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" name="status" value="<?php echo $permohonan->status ?>">
                                            <option value="">---pilih---</option>
                                            <option value="Selesai">Selesai</option>
                                            <option value="Ditolak">Ditolak</option>
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('permohonan') ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Jawab</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="5" <?php echo form_error('Jawab') ? 'is-invalid' : '' ?> type="text" name="Jawab" placeholder="Jawaban Atas Permohonan Informasi">
										</textarea>
                                    </div>
                                </div>

                                <button type="submit" name="btn" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
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
    <?php $this->load->view('dev/admin/partials/js.php') ?>
</body>

</html>
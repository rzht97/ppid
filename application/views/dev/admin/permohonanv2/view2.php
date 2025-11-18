<!DOCTYPE html>
<html lang="en">

<head>
    <title>Permohonan Informasi - Admin PPID Kab. Sumedang</title>
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
                                                <?php echo $data->tanggal ?>
                                            </td>
                                            <td>
                                                <?php echo $data->nama ?>
                                            </td>
                                            <td>
                                                <?php echo $data->pekerjaan ?>
                                            </td>
                                            <td>
                                                <?php echo $data->nohp ?> /
                                                <?php echo $data->email ?>
                                            </td>
                                            <td>
                                                <?php echo $data->ktp ?>
                                            </td>
                                            <td>
                                                <?php echo $data->status ?>
                                            </td>

                                            <td width="250">
                                                <?php if ($data->status == "Menunggu Verifikasi") : ?>
                                                    <a href='<?php echo site_url('
                                                admin/permohonan/verifikasi/' . $data->mohon_id) ?>'><button type="button" class="fcbtn btn btn-info btn-outline btn-1b" style="width:100px">Verifikasi </button></a>
                                                <?php elseif ($data->status == "Sedang Diproses") : ?>
                                                    <!--<button class="fcbtn btn btn-warning btn-outline btn-1b" data-toggle="modal" data-target="#modalproses" onClick="detail(<?php echo $data->mohon_id ?>)" style="width:100px">Proses</button>-->
												<a href="<?php echo site_url('admin/permohonan/edit/' . $data->mohon_id) ?>" class="fcbtn btn btn-outline btn-warning btn-1b"><i class="fa fa-edit"></i> Edit</a>

                                                <?php else : ?>
                                                    <button class="fcbtn btn btn-success btn-outline btn-1b" data-toggle="modal" data-target="#exampleModal1" style="width:100px">Lihat</button>
												<a href="<?php echo site_url('admin/permohonan/detail/' . $data->mohon_id) ?>" class="fcbtn btn btn-success btn-outline btn-1b" style="width:100px"> Selesai</a>
                                                <?php endif ?>
                                                <div class="modal fade" id="modalproses" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Detail
                                                                    Permohonan</h4>
                                                            </div>
                                                            <div class="modal-body" id="data_detail">
                                                                ....
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <?php $this->load->view('dev/admin/partials/js.php') ?>
</body>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<script>
    function detail(mohon_id) {
		alert(mohon_id);
        $.ajax({
            url: "<?= base_url('admin/permohonan/detail') ?>",
            type: "POST",
            data: {nama:nama},
            success: function(getreturn) {
                $('#data_detail').html(getreturn);
            }
        })
    }
</script>

</html>
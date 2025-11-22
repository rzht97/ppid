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
							<div class="card-header">
								<a href="<?php echo site_url('admin/dokumen/add') ?>" class="fcbtn btn btn-outline btn-success btn-1b"><i class="fa fa-plus"></i> Add New</a>
							</div>
							<br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Status</th>
                                            <th>Jawab</th>
                                            <th>Pengaju</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($berita as $berita_kec) : ?>
                                            <tr>
                                                <td width="150">
                                                    <?php echo html_escape($berita_kec->judul) ?>
                                                </td>
                                                <td>
                                                    <?php echo html_escape($berita_kec->status) ?>
                                                </td>
                                                <td>
                                                    <?php echo html_escape($berita_kec->jawab) ?>
                                                </td>
                                                <td>
                                                    <?php echo html_escape($berita_kec->pengaju) ?>
                                                </td>

                                                <td width="250">
                                                    <a href="<?php echo site_url('admin/info/edit/' . $berita_kec->informasi_id) ?>" class="fcbtn btn btn-outline btn-warning btn-1b"><i class="fa fa-edit"></i> Edit</a>

                                                    <!-- FIX HIGH: Delete using POST method with CSRF token -->
                                                    <form id="delete-form-<?php echo $berita_kec->informasi_id ?>" action="<?php echo site_url('admin/info/delete/' . $berita_kec->informasi_id) ?>" method="post" style="display:inline;">
                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                        <button type="button" onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) document.getElementById('delete-form-<?php echo $berita_kec->informasi_id ?>').submit();" class="fcbtn btn btn-outline btn-danger btn-1b"><i class="fa fa-trash"></i> Hapus</button>
                                                    </form>
                                                    <!-- <a href="<?php echo base_url() . 'index.php/admin/berita/download/' . $berita_kec->berita_id; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt">download</a> -->
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

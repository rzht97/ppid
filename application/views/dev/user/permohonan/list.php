<!DOCTYPE html>
<html lang="en">

<head>
    <title>Permohonan Informasi - PPID Kab. Sumedang</title>
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
                        <h4 class="page-title">Daftar Permohonan Informasi</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active"><a href="#">Permohonan</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="button-box">
                                <a href="#"><button class="fcbtn btn btn-primary btn-outline btn-1b"><i class="fa fa-plus m-r-5"></i>
                                        <span>Buat Permohonan Informasi</span>
                                    </button></a>

                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
									
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Jawaban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach ($info as $info): ?>
										<tr>
											<td width="150">
												<?php echo $info->judul ?>
											</td>
											<td>
												<?php echo $info->tanggal ?>
											</td>
											<td class="small">
												<?php echo substr($info->deskripsi, 0, 120) ?>...
											</td>
											<td>
												<?php echo $info->status ?>
											</td>
											<td>
												<?php echo $info->jawab ?>
											</td>
											<td width="250">
												<a href="<?php echo site_url('user/informasi/detail/'.$info->informasi_id) ?>"
											 class="btn btn-small"><i class="fa fa-edit"></i>Detail</a>
												<a onclick="deleteConfirm('<?php echo site_url('user/informasi/delete/'.$info->informasi_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											</td>
										</tr>
										<?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2022 Copyright by Diskominfosanditik Kab. Sumedang </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('dev/user/partials/js.php')?>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                );

                                last = group;
                            }
                        });
                    }
                });

                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!--Style Switcher -->
    <script src="<?= base_url(); ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
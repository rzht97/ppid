<!DOCTYPE html>
<html lang="en">


<head>
    <title>Daftar Informasi Publik - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <link href="<?= base_url() ?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?php $this->load->view('dev/partials/header.php') ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="page-header-shape-1"></div>
            <!-- /.page-header-shape-1 -->
            <div class="page-header-shape-2"></div>
            <!-- /.page-header-shape-2 -->
            <div class="page-header-shape-3"></div>
            <!-- /.page-header-shape-3 -->
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index-2.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>DIP</li>
                    </ul>
                    <h2>Daftar Informasi Publik</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class = "services-details">
            <!---->
            <div class="container2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ringkasan Isi Informasi </th>
                                            <th>Pejabat Yang Menguasai Informasi</th>
                                            <th>Penanggungjawab Pembuatan/Penerbitan Informasi</th>
                                            <th>Waktu Pembuatan/Penerbitan Informasi</th>
                                            <th>Jenis Informasi</th>
                                            <th>Bentuk Informasi</th>
                                            <th>Jangka Waktu Penyimpanan</th>
                                            <th>Dokumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dokumen as $dok_kec) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $dok_kec->judul ?>
                                                </td>
                                                <td>
                                                    <?php echo $dok_kec->pejabat ?>
                                                </td>
                                                <td>
                                                    <?php echo $dok_kec->pjinformasi ?>
                                                </td>
                                                <td>
                                                    <?php echo $dok_kec->tanggal ?>
                                                </td>
                                                <td>
                                                    <?php echo $dok_kec->kategori ?>
                                                </td>
                                                <td>
                                                    <?php echo $dok_kec->bentukinfo ?>
                                                </td>
                                                <td>
                                                    <?php echo $dok_kec->jangkawaktu ?>
                                                </td>
                                                <td>
                                                    <?php if ($dok_kec->image == "Belum Tersedia") { ?>
                                                        <a target="_blank" href="<?php echo $dok_kec->sumberdata; ?>"><button class="btn btn-success waves-effect waves-light" type="button"><i class="fa fa-external-link">Lihat</i></button></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo site_url('download/' . $dok_kec->id); ?>"><button class="btn btn-success waves-effect waves-light" type="button"><i class="fa fa-download"></i></button></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view("dev/partials/sectionapp.php") ?>

        <!--Site Footer One Start-->
        <?php $this->load->view("dev/partials/footer.php") ?>
        <!--Site Footer One End-->


    </div>
    <!-- /.page-wrapper -->


    <?php $this->load->view("dev/partials/mobilemenu.php") ?>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <?php $this->load->view('dev/partials/js.php') ?>

    <script src="<?= base_url() ?>inverse/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>inverse/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>inverse/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>inverse/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>inverse/js/custom.min.js"></script>
    <script src="<?= base_url() ?>inverse/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
    <script src="<?= base_url() ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


</html>
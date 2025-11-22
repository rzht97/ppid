<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pengajuan Permohonan Informasi - PPID Kab. Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>

    <style>
        .message-box { background: #f5f5f5; padding: 40px 0; }
        .white-box { background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); padding: 25px; }
    </style>
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
                        <li><a href="https://ppid.sumedangkab.go.id">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Permohonan</li>
                    </ul>
                    <h2>PERMOHONAN INFORMASI PUBLIK</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Form Permhononan-->
        <section class="message-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Formulir Permohonan Informasi Publik</h3>
                            <p class="text-muted m-b-30 font-13"></p>

                            <!-- Flash Messages -->
                            <?php if($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible" style="border-radius: 6px; margin-bottom: 20px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <i class="fa fa-check-circle"></i> <strong>Berhasil!</strong><br>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible" style="border-radius: 6px; margin-bottom: 20px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Error!</strong><br>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <form data-toogle="validator" class="form-horizontal">
                                <div class="form-body">
                                    <h2 class="box-title">Data Pemohon</h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $keberatan->nama ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Pekerjaan:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $keberatan->pekerjaan ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Alamat:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $keberatan->alamat ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">No HP/e-Mail:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $keberatan->nohp ?> /<?php echo $permohonan->email ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="box-title">Keberatan Atas Informasi</h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Alasan Pengajuan Keberatan : </label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $keberatan->alasan ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">KASUS POSISI /KRONOLOGI:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $keberatan->kronologi ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Keberatan Diajukan:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo date('d-m-Y H:i', strtotime($keberatan->tanggal)) ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status Keberatan:</label>
                                                <div class="col-md-9">
                                                    <?php if ($keberatan->status_keberatan == 'Menunggu Verifikasi') : ?>
                                                        <button class="btn btn-block btn-warning disabled"><?php echo $keberatan->status_keberatan ?> </button>
                                                    <?php elseif ($keberatan->status_keberatan == 'Sedang Diproses') : ?>
                                                        <button class="btn btn-block btn-info disabled"><?php echo $keberatan->status_keberatan ?> </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-block btn-success disabled"><?php echo $keberatan->status_keberatan ?> </button>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (!empty($keberatan->tanggapan)) : ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Tanggapan PPID:</label>
                                                <div class="col-md-12">
                                                    <p class="form-control-static"> <?php echo $keberatan->tanggapan ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($keberatan->putusan)) : ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Putusan:</label>
                                                <div class="col-md-12">
                                                    <p class="form-control-static"> <?php echo $keberatan->putusan ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label class="control-label">Status :</label>
                                        <div class="col-md-3">
                                            <?php if ($permohonan->status == 'Menunggu Verifikasi') : ?>
                                                <button class="btn btn-block btn-warning disabled"><?php echo $permohonan->status ?> </button>
                                            <?php elseif ($permohonan->status == 'Sedang Diproses') : ?>
                                                <button class="btn btn-block btn-info disabled"><?php echo $permohonan->status ?> </button>
                                            <?php else : ?>
                                                <button class="btn btn-block btn-success disabled"><?php echo $permohonan->status ?> </button>
                                            <?php endif ?>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--Form Permohonan End-->

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
    <script src="<?= base_url() ?>inverse/js/validator.js"></script>

    <!--Style Switcher -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <?php $this->load->view('dev/admin/partials/js.php') ?>

</body>


</html>
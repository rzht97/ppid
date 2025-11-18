<!DOCTYPE html>
<html lang="en">


<head>
    <title>Pengajuan Permohonan Informasi - PPID Kab. Sumedang</title>
    
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" />
    <link rel="manifest" href="<?= base_url() ?>newestassets/images/favicons/site.webmanifest" />
    <meta name="description" content="Aivons HTML Template For Business Consulting" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/aivons-icons/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/twentytwenty/twentytwenty.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/vendors/bxslider/css/jquery.bxslider.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons-responsive.css" />

    <!-- RTL Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons-rtl.css">

    <!-- color css -->
    <link rel="stylesheet" id="jssDefault" href="<?= base_url() ?>newestassets/css/colors/color-default.css">
    <link rel="stylesheet" id="jssMode" href="<?= base_url() ?>newestassets/css/modes/aivons-normal.css">
	<link href="<?= base_url()?>inverse/css/colors/default.css" id="theme" rel="stylesheet">

    <!-- toolbar css -->
    <link rel="stylesheet" href="<?= base_url() ?>newestassets/css/aivons-toolbar.css">

	<!--button css-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	
	<link href="<?= base_url()?>inverse/css/style.css" rel="stylesheet">
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
                            <form  data-toogle = "validator" class="form-horizontal" action="<?php base_url('pub/permohonan/permohonan') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12">Nama</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('nama') ? 'is-invalid' : '' ?> name = "nama" placeholder="Nama" required>
										<div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Pekerjaan</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?> name = "pekerjaan" placeholder="Pekerjaan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('alamat') ? 'is-invalid' : '' ?> name = "alamat" placeholder="Alamat" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nomor Telepon</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" <?php echo form_error('nohp') ? 'is-invalid' : '' ?> name = "nohp" placeholder="No Telepon" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">email</label>
                                    <div class="col-md-12">
                                        <input type="email" id="email" <?php echo form_error('email') ? 'is-invalid' : '' ?> name = "email"  class="form-control"  placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Rincian Informasi</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" <?php echo form_error('rincian') ? 'is-invalid' : '' ?> name = "rincian" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Tujuan Penggunaan Informasi</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" <?php echo form_error('tujuan') ? 'is-invalid' : '' ?> name = "tujuan" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Cara Memperoleh Informasi</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" <?php echo form_error('caraperoleh') ? 'is-invalid' : '' ?> name = "caraperoleh">
											<option value = "Mendapat Salinan informasi (hardcopy/softcopy)" >Mendapat Salinan informasi (hardcopy/softcopy)</option>
                                            <option value = "Melihat/membaca/mendengarkan/mecatat">Melihat/membaca/ mendengarkan/mecatat</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Cara Mendapat Salinan Informasi</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" <?php echo form_error('caradapat') ? 'is-invalid' : '' ?> name = "caradapat">
                                            <option value = "Mengambil Langsung">Mengambil Langsung</option>
                                            <option value = "Kurir">Kurir</option>
                                            <option value = "Pos">Pos</option>
                                            <option value = "faksimil">faksimil</option>
                                            <option value = "E-mail">E-mail</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Upload Foto KTP</label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input class="form-control-file <?php echo form_error('ktp') ? 'is-invalid' : '' ?>" type="file" name="ktp" required>
                                            </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a></div>
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="checkbox">
                                        <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
                                        <label for="terms" > <a href ='#' data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Hak-hak Pemohon Informasi</a> </label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
								
                                <br>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
							<div id = "exampleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <h4>Hak-Hak Pemohon Informasi
Berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</h4>
                                            <p>1. Pemohon informasi berhak untuk meminta seluruh informasi yang berada di Badan Publik kecuali (a) informasi yang apabila dibuka dan diberikan kepada pemohon informasi dapat menghambat proses penegakan hukum; Mengganggu kepentingan perlindungan hak atas kekayaan intelektual dan perlindungan dari persaingan usaha tidak sehat;membahayakan pertahanan dan keamanan Negara; Mengungkap kekayaan alam Indonesia; merugikan ketahanan ekonomi nasional; merugikan kepentingan hubungan luar negeri; Mengungkap isi pakta otentik yang bersifat pribadi dan kemauan terakhir ataupun wasiat seseorang; Mengungkap rahasia pribadi; Memorandum atau surat-surat antar Badan Publik atau intra Badan Publik yang menurut sifatnya dirahasiahkan kecuali atas putusan Komisi Informasi atau Pengadilan; Informasi yang tidak boleh diungkapkan berdasarkan Undang-Undang. (b) Badan Publik juga dapat tidak memberikan informasi yang belum dikuasai atau didokumentasikan.</p>
											<br>
											<p>2. PASTIKAN ANDA MENDAPAT TANDA BUKTI PERMOHONAN INFORMASI BERUPA NOMOR PENDAFTARAN KE PETUGAS INFORMASI/PPID. Bila tanda bukti permohonan informasi tidak diberikan, tanyakan kepada petugas informasi alasannya,mungkin permintaan informasi anda kurang lengkap. </p>
											<br>
											<p>3. Pemohon Informasi berhak mendapat pemberitahuan tertulis tentang diterima atau tidaknya permohonan informasi dalam jangka waktu 10 (sepuluh) hari kerja sejak diterimanya permohonan informasi oleh Badan Publik. Badan Publik dapat memperpanjang waktu untuk memberi jawaban tertulis 1 x 7 hari kerja, dalam hal :informasi yang diminta belum dikuasai /didokumentasikan/belum dapat diputuskan apakah informasi yang diminta termasuk informasi yang dikecualiakan atau tidak.</p>
                                            <br>
											<p>4. Biaya yang dikenakan bagi permintaan atas salinan informasi berdasarkan surat keputusan pimpinan Badan Publik adalah (di isi sesuai dengan surat Keputusan Pimpinan Badan Publik)</p>
											<br>
											<p>5. Apabila Pemohon Informasi tidak puas dengan keputusan Badan publik (misal: menolak permintaan anda atau meberikan hanya yang diminta), maka pemohon informasi dapat mengajukan keberatan kepada atasan PPID dalam jangka waktu 30 (tigapuluh) hari kerja sejak permohonan informasi ditolak/ditemukanya alasan keberatan lainya. Atasan PPID wajib memberikan tanggapan tertulis atas keberatan yang diajukan Pemohon Informasi selambat-lambatnya30 (tigapuluh) hari kerja sejak diterima/dicatatnya pengajuan keberatan dalam register keberatan.</p>
											<br>
											<p>6. Apabila Pemohon Informasi tidak puas dengan keputusan Atasan PPID, maka pemohon informasi dapat
mengajukan keberatan kepada komisi Informasi dalam jangka waktu14 (empatbelas) hari kerja sejak
diterimanya keputusan atasan PPID oleh Pemohon Informasi Publik.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
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
	<?php $this->load->view('dev/admin/partials/js.php')?>
	
</body>


</html>
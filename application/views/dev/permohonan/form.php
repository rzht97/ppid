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

	<link href="<?= base_url()?>inverse/css/style.css" rel="stylesheet">

    <!-- Custom Form Styles -->
    <style>
        /* Form Container */
        .form-container {
            padding: 40px 0;
        }
        .form-container .white-box {
            padding: 25px;
            max-width: 900px;
            margin: 0 auto;
        }
        .form-container .box-title {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 22px;
        }
        .form-container .text-muted {
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* Form Groups and Labels */
        .form-horizontal .form-group {
            margin-bottom: 15px;
        }
        .form-horizontal .form-group label {
            margin-bottom: 6px;
            font-size: 14px;
        }

        /* Alerts */
        .form-container .alert {
            padding: 12px;
            margin-bottom: 15px;
        }
        .form-container .alert span {
            margin-top: 5px;
            display: inline-block;
        }
        .form-container .alert div {
            margin-top: 5px;
        }

        /* Error Messages and Help Text */
        .form-group .text-danger {
            margin-top: 5px;
            font-size: 13px;
        }
        .form-group .help-block {
            margin-top: 5px;
        }
        .form-group .help-block small {
            font-size: 12px;
        }

        /* Form Controls */
        .form-control {
            font-size: 14px;
        }
        textarea.form-control {
            padding: 10px 12px;
        }

        /* File Upload Custom Styles */
        .custom-file-upload {
            margin-bottom: 8px;
        }
        .file-clear-btn {
            margin-top: 6px;
            display: none;
        }
        #ktpPreviewContainer {
            margin-top: 12px;
            display: none;
        }
        #ktpPreviewContainer > div {
            background-color: #f9f9f9;
            padding: 12px;
            border: 2px solid #e8e8e8;
            border-radius: 6px;
            text-align: center;
        }
        #ktpPreviewContainer label {
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }
        #ktpPreview {
            max-width: 100%;
            max-height: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        #pdfPreview {
            display: none;
        }
        #pdfPreview i {
            font-size: 50px;
            color: #d9534f;
        }
        #pdfPreview p:first-of-type {
            margin-top: 8px;
            font-weight: bold;
            font-size: 14px;
        }
        #pdfPreview p:last-of-type {
            margin: 5px 0;
            font-size: 13px;
        }

        /* Agreement Section */
        #agreementSection .btn-info {
            width: 100%;
            padding: 12px;
            margin-bottom: 8px;
            font-size: 14px;
        }
        #agreementStatus {
            display: none;
            padding: 12px;
            background-color: #d4edda;
            border: 2px solid #c3e6cb;
            border-radius: 6px;
            text-align: center;
        }
        #agreementStatus i {
            color: #28a745;
            font-size: 20px;
        }
        #agreementStatus p {
            margin: 8px 0 0 0;
            color: #155724;
            font-weight: bold;
            font-size: 14px;
        }
        #agreementWarning {
            padding: 8px;
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 4px;
            text-align: center;
        }
        #agreementWarning small {
            color: #856404;
            font-size: 12px;
        }

        /* Form Actions */
        .form-actions {
            margin-top: 20px;
        }
        .form-actions .btn {
            padding: 10px 35px;
            font-size: 14px;
        }
        .form-actions .btn-default {
            padding: 10px 30px;
        }

        /* Modal */
        .modal-body {
            line-height: 1.6;
            font-size: 14px;
        }
        .modal-body h4 {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .modal-body p {
            font-size: 13px;
            margin-bottom: 10px;
        }
        .modal-footer {
            text-align: center;
        }
        .modal-footer .btn {
            font-size: 14px;
        }

        /* Honeypot */
        .honeypot-field {
            position: absolute;
            left: -5000px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container .white-box {
                padding: 20px 15px;
            }
            .form-container {
                padding: 30px 0;
            }
        }
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
        <section class="message-box form-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Formulir Permohonan Informasi Publik</h3>
                            <p class="text-muted">Lengkapi semua field yang bertanda (<span class="text-danger">*</span>) dengan benar</p>

                            <?php if($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-times-circle"></i> <strong>Error!</strong><br>
                                    <span><?php echo $this->session->flashdata('error'); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($error_message)): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-times-circle"></i> <strong>Error!</strong><br>
                                    <span><?php echo $error_message; ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if(validation_errors()): ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian!</strong> Mohon perbaiki kesalahan berikut:
                                    <?php echo validation_errors('<div>- ', '</div>'); ?>
                                </div>
                            <?php endif; ?>

                            <form data-toogle="validator" class="form-horizontal" action="<?php echo base_url('publicpermohonan') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12"><strong>Nama Lengkap <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?php echo set_value('nama'); ?>" required>
										<?php if(form_error('nama')): ?>
                                            <div class="text-danger"><?php echo form_error('nama'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Pekerjaan <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control <?php echo form_error('pekerjaan') ? 'is-invalid' : '' ?>" name="pekerjaan" value="<?php echo set_value('pekerjaan'); ?>" required>
                                        <?php if(form_error('pekerjaan')): ?>
                                            <div class="text-danger"><?php echo form_error('pekerjaan'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Alamat <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" value="<?php echo set_value('alamat'); ?>" required>
                                        <?php if(form_error('alamat')): ?>
                                            <div class="text-danger"><?php echo form_error('alamat'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Nomor Telepon <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control <?php echo form_error('nohp') ? 'is-invalid' : '' ?>" name="nohp" value="<?php echo set_value('nohp'); ?>" required>
                                        <?php if(form_error('nohp')): ?>
                                            <div class="text-danger"><?php echo form_error('nohp'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Email <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <input type="email" id="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?php echo set_value('email'); ?>" required>
                                        <?php if(form_error('email')): ?>
                                            <div class="text-danger"><?php echo form_error('email'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Rincian Informasi yang Dibutuhkan <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <textarea class="form-control <?php echo form_error('rincian') ? 'is-invalid' : '' ?>" name="rincian" rows="5" required><?php echo set_value('rincian'); ?></textarea>
                                        <?php if(form_error('rincian')): ?>
                                            <div class="text-danger"><?php echo form_error('rincian'); ?></div>
                                        <?php endif; ?>
                                        <span class="help-block"><small>Jelaskan informasi yang Anda butuhkan sejelas mungkin</small></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong>Tujuan Penggunaan Informasi <span class="text-danger">*</span></strong></label>
                                    <div class="col-md-12">
                                        <textarea class="form-control <?php echo form_error('tujuan') ? 'is-invalid' : '' ?>" name="tujuan" rows="5" required><?php echo set_value('tujuan'); ?></textarea>
                                        <?php if(form_error('tujuan')): ?>
                                            <div class="text-danger"><?php echo form_error('tujuan'); ?></div>
                                        <?php endif; ?>
                                        <span class="help-block"><small>Jelaskan untuk apa informasi tersebut akan digunakan</small></span>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-12" style="margin-bottom: 8px;"><strong>Cara Memperoleh Informasi <span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('caraperoleh') ? 'is-invalid' : '' ?>" name="caraperoleh" required>
											<option value="" Hidden></option>
											<option value="Mendapat Salinan informasi (hardcopy/softcopy)">Mendapat Salinan Informasi (Hardcopy/Softcopy)</option>
                                            <option value="Melihat/membaca/mendengarkan/mecatat">Melihat/Membaca/Mendengarkan/Mencatat</option>
                                        </select>
                                        <?php if(form_error('caraperoleh')): ?>
                                            <div class="text-danger"><?php echo form_error('caraperoleh'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-12" style="margin-bottom: 8px;"><strong>Cara Mendapat Salinan Informasi <span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-12">
                                        <select class="form-control <?php echo form_error('caradapat') ? 'is-invalid' : '' ?>" name="caradapat" required>
											<option value="" Hidden></option>
                                            <option value="Mengambil Langsung">Mengambil Langsung</option>
                                            <option value="Kurir">Kurir</option>
                                            <option value="Pos">Pos</option>
                                            <option value="Faksimil">Faksimil</option>
                                            <option value="E-mail">E-mail</option>
                                        </select>
                                        <?php if(form_error('caradapat')): ?>
                                            <div class="text-danger"><?php echo form_error('caradapat'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12"><strong>Upload Foto KTP <span class="text-danger">*</span></strong></label>
                                    <div class="col-sm-12">
                                        <!-- Custom File Upload -->
                                        <div class="custom-file-upload">
                                            <div style="position: relative; display: inline-block; width: 100%;">
                                                <input type="file" name="ktp" id="ktpInput" accept="image/jpeg,image/jpg,image/png,application/pdf" required style="display: none;">
                                                <div class="input-group" style="width: 100%;">
                                                    <input type="text" id="ktpFileName" class="form-control" placeholder="Belum ada file yang dipilih" readonly style="background-color: #fff; cursor: pointer;">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('ktpInput').click();" style="height: 34px;">
                                                            <i class="fa fa-folder-open"></i> Pilih File
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <button type="button" id="clearKtpBtn" class="btn btn-danger btn-sm file-clear-btn" onclick="clearKtpFile()">
                                                <i class="fa fa-times"></i> Hapus File
                                            </button>
                                        </div>
                                        <?php if(form_error('ktp')): ?>
                                            <div class="text-danger"><?php echo form_error('ktp'); ?></div>
                                        <?php endif; ?>
                                        <span class="help-block"><small>Upload foto KTP dalam format JPG, PNG, atau PDF (Maksimal 2MB)</small></span>

                                        <!-- Preview Container -->
                                        <div id="ktpPreviewContainer">
                                            <div>
                                                <label><strong>Preview KTP:</strong></label>
                                                <img id="ktpPreview" src="" alt="Preview KTP">
                                                <div id="pdfPreview">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                    <p id="pdfFileName"></p>
                                                    <p class="text-muted">File PDF telah dipilih</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

								<div class="form-group">
                                    <div class="col-sm-12">
                                        <!-- Hidden checkbox for form validation -->
                                        <input type="checkbox" id="terms" name="terms" required style="display: none;">

                                        <!-- Agreement button and status -->
                                        <div id="agreementSection">
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-file-text-o"></i> Baca Hak-hak Pemohon Informasi
                                            </button>

                                            <div id="agreementStatus">
                                                <i class="fa fa-check-circle"></i>
                                                <p>Anda telah menyetujui Hak-hak Pemohon Informasi</p>
                                            </div>

                                            <div id="agreementWarning">
                                                <small>
                                                    <i class="fa fa-exclamation-triangle"></i> Anda harus membaca dan menyetujui Hak-hak Pemohon Informasi untuk melanjutkan
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Honeypot field - Anti-bot protection (DO NOT REMOVE) -->
                                <div class="honeypot-field" aria-hidden="true">
                                    <label for="website_url">Leave this field blank</label>
                                    <input type="text" name="website_url" id="website_url" value="" tabindex="-1" autocomplete="off">
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">
                                                <i class="fa fa-paper-plane"></i> Kirim Permohonan
                                            </button>
                                            <a href="<?php echo site_url('cekstatus'); ?>" class="btn btn-default btn-lg waves-effect waves-light">
                                                <i class="fa fa-times"></i> Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
							<div id="exampleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                                <i class="fa fa-times"></i> Batal
                                            </button>
                                            <button type="button" class="btn btn-success waves-effect" onclick="agreeToTerms()">
                                                <i class="fa fa-check"></i> Saya Setuju
                                            </button>
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

	<!-- KTP Preview Script -->
	<script>
		// Function to handle KTP file upload preview
		document.getElementById('ktpInput').addEventListener('change', function(e) {
			const file = e.target.files[0];
			const fileNameDisplay = document.getElementById('ktpFileName');
			const clearBtn = document.getElementById('clearKtpBtn');
			const previewContainer = document.getElementById('ktpPreviewContainer');
			const imagePreview = document.getElementById('ktpPreview');
			const pdfPreview = document.getElementById('pdfPreview');
			const pdfFileName = document.getElementById('pdfFileName');

			if (file) {
				// Validate file size (2MB = 2097152 bytes)
				if (file.size > 2097152) {
					alert('Ukuran file terlalu besar! Maksimal 2MB.');
					e.target.value = '';
					fileNameDisplay.value = '';
					clearBtn.style.display = 'none';
					previewContainer.style.display = 'none';
					return;
				}

				const fileType = file.type;
				const fileName = file.name;

				// Display file name
				fileNameDisplay.value = fileName;
				clearBtn.style.display = 'inline-block';

				// Show preview container
				previewContainer.style.display = 'block';

				// Check if file is an image
				if (fileType.match('image.*')) {
					const reader = new FileReader();

					reader.onload = function(e) {
						imagePreview.src = e.target.result;
						imagePreview.style.display = 'block';
						pdfPreview.style.display = 'none';
					};

					reader.readAsDataURL(file);
				}
				// Check if file is PDF
				else if (fileType === 'application/pdf') {
					imagePreview.style.display = 'none';
					pdfPreview.style.display = 'block';
					pdfFileName.textContent = fileName;
				}
				else {
					alert('Format file tidak didukung! Gunakan JPG, PNG, atau PDF.');
					e.target.value = '';
					fileNameDisplay.value = '';
					clearBtn.style.display = 'none';
					previewContainer.style.display = 'none';
				}
			} else {
				fileNameDisplay.value = '';
				clearBtn.style.display = 'none';
				previewContainer.style.display = 'none';
			}
		});

		// Function to clear file when "Hapus File" button is clicked
		function clearKtpFile() {
			const fileInput = document.getElementById('ktpInput');
			const fileNameDisplay = document.getElementById('ktpFileName');
			const clearBtn = document.getElementById('clearKtpBtn');
			const previewContainer = document.getElementById('ktpPreviewContainer');
			const imagePreview = document.getElementById('ktpPreview');

			// Clear file input
			fileInput.value = '';
			fileNameDisplay.value = '';
			clearBtn.style.display = 'none';

			// Clear preview
			previewContainer.style.display = 'none';
			imagePreview.src = '';

			return false;
		}

		// Make the text input clickable to trigger file selection
		document.getElementById('ktpFileName').addEventListener('click', function() {
			document.getElementById('ktpInput').click();
		});
	</script>

	<!-- Terms Agreement Script -->
	<script>
		function agreeToTerms() {
			// Check the hidden checkbox
			document.getElementById('terms').checked = true;

			// Force close the modal using multiple methods for compatibility
			$('#exampleModal').modal('hide');

			// Additional cleanup to ensure modal is fully closed
			setTimeout(function() {
				// Remove modal classes and attributes
				$('#exampleModal').removeClass('show in').attr('aria-hidden', 'true').css('display', 'none');

				// Remove all backdrop elements
				$('.modal-backdrop').remove();

				// Clean up body
				$('body').removeClass('modal-open').css('padding-right', '').css('overflow', '');

				// Show success status
				document.getElementById('agreementStatus').style.display = 'block';

				// Hide warning
				document.getElementById('agreementWarning').style.display = 'none';

				// Scroll to the status message
				document.getElementById('agreementStatus').scrollIntoView({ behavior: 'smooth', block: 'center' });
			}, 100);
		}
	</script>

	<!-- Real-time Validation Script -->
	<script>
	$(document).ready(function() {
		// Real-time validation functions
		const validators = {
			nama: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Nama wajib diisi';
				}
				if (value.length < 3) {
					return 'Nama minimal 3 karakter';
				}
				if (value.length > 100) {
					return 'Nama maksimal 100 karakter';
				}
				return null;
			},

			alamat: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Alamat wajib diisi';
				}
				if (value.length < 5) {
					return 'Alamat minimal 5 karakter';
				}
				return null;
			},

			pekerjaan: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Pekerjaan wajib diisi';
				}
				return null;
			},

			nohp: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Nomor telepon wajib diisi';
				}
				if (!/^\d+$/.test(value)) {
					return 'Nomor telepon hanya boleh berisi angka';
				}
				if (value.length < 10) {
					return 'Nomor telepon minimal 10 digit';
				}
				if (value.length > 15) {
					return 'Nomor telepon maksimal 15 digit';
				}
				return null;
			},

			email: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Email wajib diisi';
				}
				const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!emailRegex.test(value)) {
					return 'Format email tidak valid';
				}
				return null;
			},

			rincian: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Rincian informasi wajib diisi';
				}
				if (value.length < 10) {
					return 'Rincian informasi minimal 10 karakter';
				}
				return null;
			},

			tujuan: function(value) {
				if (!value || value.trim().length === 0) {
					return 'Tujuan penggunaan informasi wajib diisi';
				}
				return null;
			},

			ktp: function(fileInput) {
				if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
					return 'File KTP wajib diupload';
				}
				return null;
			},

			terms: function(checkbox) {
				if (!checkbox || !checkbox.checked) {
					return 'Anda harus menyetujui Hak-hak Pemohon Informasi';
				}
				return null;
			}
		};

		// Function to show error message
		function showError(fieldName, errorMessage) {
			const field = $('[name="' + fieldName + '"]');
			const parent = field.closest('.form-group');

			// Remove existing error
			parent.find('.validation-error').remove();
			field.removeClass('is-invalid').addClass('is-invalid');

			// Add new error message
			if (errorMessage) {
				const errorDiv = $('<div class="text-danger validation-error" style="margin-top: 5px;"></div>').text(errorMessage);
				field.closest('.col-md-12, .col-sm-12').append(errorDiv);
			}
		}

		// Function to clear error message
		function clearError(fieldName) {
			const field = $('[name="' + fieldName + '"]');
			const parent = field.closest('.form-group');

			parent.find('.validation-error').remove();
			field.removeClass('is-invalid');
		}

		// Function to validate a field
		function validateField(fieldName) {
			const field = $('[name="' + fieldName + '"]');
			let value;

			if (fieldName === 'ktp') {
				value = field[0];
			} else if (fieldName === 'terms') {
				value = field[0];
			} else {
				value = field.val();
			}

			if (validators[fieldName]) {
				const error = validators[fieldName](value);
				if (error) {
					showError(fieldName, error);
					return false;
				} else {
					clearError(fieldName);
					return true;
				}
			}
			return true;
		}

		// Attach blur event listeners for text inputs
		$('input[name="nama"], input[name="alamat"], input[name="pekerjaan"], input[name="nohp"], input[name="email"]').on('blur', function() {
			validateField($(this).attr('name'));
		});

		// Attach blur event listeners for textareas
		$('textarea[name="rincian"], textarea[name="tujuan"]').on('blur', function() {
			validateField($(this).attr('name'));
		});

		// Attach change event for file input
		$('input[name="ktp"]').on('change', function() {
			validateField('ktp');
		});

		// Real-time input validation (while typing)
		$('input[name="nama"], input[name="alamat"], input[name="pekerjaan"], input[name="nohp"], input[name="email"]').on('input', function() {
			const fieldName = $(this).attr('name');
			// Clear error immediately when user starts typing
			clearError(fieldName);
		});

		$('textarea[name="rincian"], textarea[name="tujuan"]').on('input', function() {
			const fieldName = $(this).attr('name');
			clearError(fieldName);
		});

		// Validate all fields before form submission
		$('form').on('submit', function(e) {
			let isValid = true;

			// Validate all fields
			const fieldsToValidate = ['nama', 'alamat', 'pekerjaan', 'nohp', 'email', 'rincian', 'tujuan', 'ktp', 'terms'];

			fieldsToValidate.forEach(function(fieldName) {
				if (!validateField(fieldName)) {
					isValid = false;
				}
			});

			if (!isValid) {
				e.preventDefault();

				// Scroll to first error
				const firstError = $('.validation-error').first();
				if (firstError.length) {
					$('html, body').animate({
						scrollTop: firstError.offset().top - 100
					}, 500);
				}

				// Show alert
				alert('Mohon perbaiki kesalahan pada form sebelum mengirim permohonan.');
			}
		});

		// Auto-validate terms when checkbox is checked
		$('input[name="terms"]').on('change', function() {
			if ($(this).is(':checked')) {
				clearError('terms');
			}
		});
	});
	</script>

</body>


</html>

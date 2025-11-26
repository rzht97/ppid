<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profil Pejabat Struktural - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>

    <style>
        /* Modern Profile Card Styling */
        .profile-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .profile-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 60px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.12);
        }

        .profile-header {
            background: linear-gradient(135deg, var(--thm-primary, #0d6efd) 0%, #0056b3 100%);
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .profile-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 6px solid #fff;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            object-fit: cover;
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
        }

        .profile-name {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .profile-position {
            color: rgba(255,255,255,0.9);
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .profile-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .profile-social a {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .profile-social a:hover {
            background: #fff;
            color: var(--thm-primary, #0d6efd);
            transform: translateY(-3px);
        }

        .profile-body {
            padding: 40px;
        }

        .info-section {
            margin-bottom: 40px;
        }

        .info-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 3px solid var(--thm-primary, #0d6efd);
            display: inline-block;
        }

        .section-title i {
            margin-right: 10px;
            color: var(--thm-primary, #0d6efd);
        }

        .info-grid {
            display: grid;
            gap: 15px;
        }

        .info-item {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #ecf0f1;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            min-width: 200px;
            font-weight: 600;
            color: #34495e;
        }

        .info-value {
            color: #555;
            flex: 1;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--thm-primary, #0d6efd), rgba(13, 110, 253, 0.3));
        }

        .timeline-item {
            position: relative;
            padding-bottom: 25px;
            padding-left: 35px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -6px;
            top: 5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: var(--thm-primary, #0d6efd);
            border: 3px solid #fff;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-content {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 10px;
            border-left: 3px solid var(--thm-primary, #0d6efd);
        }

        .timeline-year {
            font-size: 14px;
            font-weight: 600;
            color: var(--thm-primary, #0d6efd);
            margin-bottom: 5px;
        }

        .timeline-text {
            color: #555;
            line-height: 1.6;
            margin: 0;
        }

        .awards-grid {
            display: grid;
            gap: 15px;
        }

        .award-item {
            background: linear-gradient(135deg, #fff9e6 0%, #fff 100%);
            padding: 18px 22px;
            border-radius: 10px;
            border-left: 4px solid #ffc107;
            display: flex;
            align-items: start;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .award-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.2);
        }

        .award-icon {
            font-size: 24px;
            color: #ffc107;
            flex-shrink: 0;
        }

        .award-text {
            color: #555;
            line-height: 1.6;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-section {
                padding: 40px 0;
            }

            .profile-card {
                margin-bottom: 40px;
            }

            .profile-header {
                padding: 30px 20px;
            }

            .profile-photo {
                width: 140px;
                height: 140px;
            }

            .profile-name {
                font-size: 22px;
            }

            .profile-position {
                font-size: 16px;
            }

            .profile-body {
                padding: 25px;
            }

            .info-label {
                min-width: 140px;
                font-size: 14px;
            }

            .info-value {
                font-size: 14px;
            }

            .section-title {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>

    <div class="page-wrapper">
        <?php $this->load->view('dev/partials/header.php') ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"></div>
            <div class="page-header-shape-1"></div>
            <div class="page-header-shape-2"></div>
            <div class="page-header-shape-3"></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Profil</li>
                    </ul>
                    <h2>PROFIL PEJABAT STRUKTURAL</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Profile Section Start-->
        <section class="profile-section">
            <div class="container">

                <!-- Bupati -->
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="<?= base_url();?>upload/pejabat/Foto Bupati.png" alt="Bupati Sumedang" class="profile-photo">
                        <h3 class="profile-name">Dr. H. DONY AHMAD MUNIR, ST., MM.</h3>
                        <p class="profile-position">Bupati Sumedang</p>
                        <div class="profile-social">
                            <a href="https://www.facebook.com/donyahmadmunir" target="_blank" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/donyahmad.munir/" target="_blank" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="profile-body">
                        <!-- Data Pribadi -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-user"></i> Data Pribadi</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Nama Lengkap</span>
                                    <span class="info-value">Dr. H. DONY AHMAD MUNIR, ST., MM.</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Tempat, Tanggal Lahir</span>
                                    <span class="info-value">Sumedang, 5 Desember 1973</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jenis Kelamin</span>
                                    <span class="info-value">Laki-Laki</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Agama</span>
                                    <span class="info-value">Islam</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jabatan</span>
                                    <span class="info-value">Bupati Sumedang</span>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Pendidikan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-graduation-cap"></i> Riwayat Pendidikan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1980</div>
                                        <p class="timeline-text">TK Muslimat NU</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1986</div>
                                        <p class="timeline-text">SDN Sukaraja 1</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1989</div>
                                        <p class="timeline-text">SMPN 1 Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1992</div>
                                        <p class="timeline-text">SMAN 1 Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1998</div>
                                        <p class="timeline-text">S1 Fakultas Teknik Industri - Teknik dan Manajemen Industri, STTG</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2005</div>
                                        <p class="timeline-text">S2 Fakultas Ekonomi - Manajemen Keuangan, UNPAD</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2020</div>
                                        <p class="timeline-text">S3 Akuntansi, UNPAD</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Jabatan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-briefcase"></i> Riwayat Jabatan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1995 - 1997</div>
                                        <p class="timeline-text">Asisten Dosen STTG Garut</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1997 - 1998</div>
                                        <p class="timeline-text">Anggota DPRD Termuda Kab. Sumedang (Sekretaris Fraksi PPP)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1999 - 2004</div>
                                        <p class="timeline-text">Anggota DPRD Termuda Kab. Sumedang (Sekretaris Fraksi PPP)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2004 - 2009</div>
                                        <p class="timeline-text">Anggota DPRD Kabupaten Sumedang (Wakil Ketua DPRD)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2009 - 2014</div>
                                        <p class="timeline-text">Anggota DPRD Provinsi Jawa Barat (Anggota Komisi B)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2014 - 2019</div>
                                        <p class="timeline-text">Anggota DPR RI (Komisi X, Wakil Sekretaris F-PPP, Anggota Banggar)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2018 - 2023</div>
                                        <p class="timeline-text">Bupati Sumedang (Periode I)</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2025 - 2030</div>
                                        <p class="timeline-text">Bupati Sumedang (Periode II)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Penghargaan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-award"></i> Penghargaan</h4>
                            <div class="awards-grid">
                                <div class="award-item">
                                    <i class="fas fa-trophy award-icon"></i>
                                    <p class="award-text"><strong>Honorary Police</strong> dari Kapolwil Priangan (2008)</p>
                                </div>
                                <div class="award-item">
                                    <i class="fas fa-trophy award-icon"></i>
                                    <p class="award-text"><strong>Tokoh Uswatun Hasanah</strong> dari BKPRMI Jawa Barat</p>
                                </div>
                                <div class="award-item">
                                    <i class="fas fa-trophy award-icon"></i>
                                    <p class="award-text"><strong>BMT Sinergi Award</strong> dari PINBUK Kabupaten Sumedang (2010)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wakil Bupati -->
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="<?= base_url();?>upload/pejabat/Foto Wakil Bupati - .png" alt="Wakil Bupati Sumedang" class="profile-photo">
                        <h3 class="profile-name">M. FAJAR ALDILA, S.H., M.Kn.</h3>
                        <p class="profile-position">Wakil Bupati Sumedang</p>
                        <div class="profile-social">
                            <a href="https://www.instagram.com/fajar.aldila/" target="_blank" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="profile-body">
                        <!-- Data Pribadi -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-user"></i> Data Pribadi</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Nama Lengkap</span>
                                    <span class="info-value">M. FAJAR ALDILA, S.H., M.Kn.</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Tempat, Tanggal Lahir</span>
                                    <span class="info-value">Bandar Lampung, 15 Juni 1992</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jenis Kelamin</span>
                                    <span class="info-value">Laki-Laki</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Agama</span>
                                    <span class="info-value">Islam</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jabatan</span>
                                    <span class="info-value">Wakil Bupati Sumedang</span>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Pendidikan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-graduation-cap"></i> Riwayat Pendidikan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2004</div>
                                        <p class="timeline-text">SDN 2 Rawa Laut Bandar Lampung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2007</div>
                                        <p class="timeline-text">SMPN 1 Bandar Lampung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2010</div>
                                        <p class="timeline-text">SMA BPI 1</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2015</div>
                                        <p class="timeline-text">S1 Hukum - Universitas Bandar Lampung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2021</div>
                                        <p class="timeline-text">S2 Kenotariatan - Universitas Pelita Harapan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Jabatan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-briefcase"></i> Riwayat Jabatan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2025 - 2030</div>
                                        <p class="timeline-text">Wakil Bupati Sumedang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sekretaris Daerah -->
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="<?= base_url();?>upload/pejabat/Foto Sekda.jpeg" alt="Sekretaris Daerah" class="profile-photo">
                        <h3 class="profile-name">Dr. Hj. TUTI RUSWATI, S.Sos., M.Si.</h3>
                        <p class="profile-position">Sekretaris Daerah Kabupaten Sumedang</p>
                        <div class="profile-social">
                            <a href="https://www.instagram.com/official_sekdasmd/" target="_blank" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="profile-body">
                        <!-- Data Pribadi -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-user"></i> Data Pribadi</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Nama Lengkap</span>
                                    <span class="info-value">Dr. Hj. TUTI RUSWATI, S.Sos., M.Si.</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Tempat, Tanggal Lahir</span>
                                    <span class="info-value">Bandung, 12 Februari 1969</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jenis Kelamin</span>
                                    <span class="info-value">Perempuan</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Agama</span>
                                    <span class="info-value">Islam</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jabatan</span>
                                    <span class="info-value">Sekretaris Daerah Kabupaten Sumedang</span>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Pendidikan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-graduation-cap"></i> Riwayat Pendidikan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1982</div>
                                        <p class="timeline-text">SDN Ciujung Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1985</div>
                                        <p class="timeline-text">SMP Negeri 16 Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1988</div>
                                        <p class="timeline-text">SMA Negeri 14 Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1991</div>
                                        <p class="timeline-text">D-III Pemerintahan - APDN Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2001</div>
                                        <p class="timeline-text">S1 Administrasi Negara - STIA Majalengka</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2009</div>
                                        <p class="timeline-text">S2 Ilmu Administrasi - STIA Sebelas April</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Jabatan (Selected) -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-briefcase"></i> Riwayat Jabatan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2015</div>
                                        <p class="timeline-text">Sekretaris Dispenda Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2017</div>
                                        <p class="timeline-text">Sekretaris Bappeda Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2019</div>
                                        <p class="timeline-text">Kepala Bappeda Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2023</div>
                                        <p class="timeline-text">Asisten Perekonomian dan Pembangunan Setda Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2024</div>
                                        <p class="timeline-text">PLH Bupati Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2024 - Sekarang</div>
                                        <p class="timeline-text">Sekretaris Daerah Kabupaten Sumedang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kepala Dinas Kominfo -->
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="<?= base_url();?>upload/pejabat/kadisonson.jpg" alt="Kepala Dinas Kominfo" class="profile-photo">
                        <h3 class="profile-name">Drs. H. SONSON MUKHAMAD NURISAN, M.Si.</h3>
                        <p class="profile-position">Kepala Dinas Komunikasi dan Informatika, Persandian dan Statistik</p>
                        <div class="profile-social">
                            <a href="https://www.instagram.com/" target="_blank" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="profile-body">
                        <!-- Data Pribadi -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-user"></i> Data Pribadi</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Nama Lengkap</span>
                                    <span class="info-value">Drs. H. SONSON MUKHAMAD NURISAN, M.Si.</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Tempat, Tanggal Lahir</span>
                                    <span class="info-value">Bandung, 16 Mei 1966</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jenis Kelamin</span>
                                    <span class="info-value">Laki-Laki</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Agama</span>
                                    <span class="info-value">Islam</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Jabatan</span>
                                    <span class="info-value">Kepala Dinas Komunikasi dan Informatika, Persandian dan Statistik Kab. Sumedang</span>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Pendidikan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-graduation-cap"></i> Riwayat Pendidikan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1979</div>
                                        <p class="timeline-text">SDN Negeri Jalan Kaum Cimahi Tengah Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1982</div>
                                        <p class="timeline-text">SMP Negeri Pasirkaliki Cimahi</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1985</div>
                                        <p class="timeline-text">SMA Swasta Darma Bakti Cimahi</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1988</div>
                                        <p class="timeline-text">D-III APDN - Akademi Pemerintahan Dalam Negeri Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">1991</div>
                                        <p class="timeline-text">S1 Ilmu Pemerintahan - Universitas Langlangbuana Bandung</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2002</div>
                                        <p class="timeline-text">S2 - Universitas Garut</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Riwayat Jabatan -->
                        <div class="info-section">
                            <h4 class="section-title"><i class="fas fa-briefcase"></i> Riwayat Jabatan</h4>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2015</div>
                                        <p class="timeline-text">Kepala Badan Kesatuan Bangsa dan Politik Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2015</div>
                                        <p class="timeline-text">Staf Ahli Bidang Pemerintahan, Hukum dan Politik pada Setda Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2017</div>
                                        <p class="timeline-text">Kepala Dinas Pendidikan Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2019</div>
                                        <p class="timeline-text">Sekretaris DPRD pada Sekretariat DPRD Kab. Sumedang</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-content">
                                        <div class="timeline-year">2025 - Sekarang</div>
                                        <p class="timeline-text">Kepala Dinas Komunikasi dan Informatika, Persandian dan Statistik Kab. Sumedang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--Profile Section End-->

        <?php $this->load->view("dev/partials/sectionapp.php") ?>

        <!--Site Footer One Start-->
        <?php $this->load->view("dev/partials/footer.php") ?>
        <!--Site Footer One End-->

    </div>
    <!-- /.page-wrapper -->

    <?php $this->load->view("dev/partials/mobilemenu.php") ?>

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <?php $this->load->view('dev/partials/js.php') ?>

</body>

</html>

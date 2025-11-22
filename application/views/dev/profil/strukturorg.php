<!DOCTYPE html>
<html lang="en">


<head>
    <title>Struktur Organisasi - PPID Kab. Sumedang</title>
    <?php $this->load->view('dev/partials/head.php') ?>
    <style>
        .struktur-section { padding: 60px 0; background: #f8f9fa; }
        .section-card { background: #fff; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); padding: 30px; margin-bottom: 30px; }
        .section-title-custom { font-size: 22px; font-weight: 600; color: #333; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 3px solid var(--thm-primary, #0d6efd); }
        .section-title-custom i { margin-right: 10px; color: var(--thm-primary, #0d6efd); }
        .struktur-img { width: 100%; border-radius: 8px; box-shadow: 0 3px 15px rgba(0,0,0,0.1); }
        .table-modern { border-collapse: separate; border-spacing: 0; width: 100%; }
        .table-modern thead th { background: linear-gradient(135deg, var(--thm-primary, #0d6efd) 0%, #0056b3 100%); color: #fff; padding: 15px 12px; font-weight: 600; text-transform: uppercase; font-size: 13px; border: none; }
        .table-modern tbody td, .table-modern tbody th { padding: 12px; border-bottom: 1px solid #e9ecef; vertical-align: middle; font-size: 14px; }
        .table-modern tbody tr:hover { background-color: #f1f8ff; }
        .table-modern tbody tr:last-child td { border-bottom: none; }
        .table-modern .section-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; font-weight: 600; text-align: center; font-size: 14px; }
        .table-modern .section-header th { padding: 12px; border: none; }
        .badge-jabatan { display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; }
        .badge-pembina { background: #fef3cd; color: #856404; }
        .badge-utama { background: #d4edda; color: #155724; }
        .badge-koordinator { background: #cce5ff; color: #004085; }
        .badge-anggota { background: #e2e3e5; color: #383d41; }
        .badge-tim { background: #f8d7da; color: #721c24; }
        @media (max-width: 768px) {
            .struktur-section { padding: 30px 0; }
            .section-card { padding: 15px; }
            .table-modern { font-size: 12px; }
            .table-modern thead th, .table-modern tbody td { padding: 8px 6px; }
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
                        <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                        <li><span>/</span></li>
                        <li>Profil</li>
                    </ul>
                    <h2>STRUKTUR ORGANISASI</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <section class="struktur-section">
            <div class="container">
                <!-- Bagan Struktur -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-sitemap"></i> Bagan Struktur Organisasi</h3>
                    <img src="<?= base_url();?>upload/profil/struktur.png" class="struktur-img" alt="Struktur Organisasi PPID">
                </div>

                <!-- Tabel Anggota -->
                <div class="section-card">
                    <h3 class="section-title-custom"><i class="fa fa-users"></i> Daftar Pejabat PPID</h3>
                    <div class="table-responsive">
                        <table class="table-modern">
                            <thead>
                                <tr>
                                    <th style="width: 50px; text-align: center;">No</th>
                                    <th>Nama</th>
                                    <th>Jabatan / Instansi</th>
                                    <th style="width: 200px;">Jabatan dalam PPID</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Dr. H. DONY AHMAD MUNIR, ST., MM</td>
                                <td>Bupati Sumedang</td>
                                <td>Pembina</td>
                            </tr>
							
							<tr>
                                <th scope="row">2</th>
                                <td>M. FAJAR ALDILA, S.H., M.Kn. </td>
                                <td>Wakil Bupati Sumedang</td>
                                <td>Pembina</td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>Hj. TUTI RUSWATI, S.Sos.M.Si</td>
                                <td>Sekertaris Daerah Kabupaten Sumedang </td>
                                <td>Atasan PPID/Pengarah</td>
                            </tr>

                            <tr>
                                <th scope="row">4</th>
                                <td>Dr. DIAN SUKMARA, M. Pd.</td>
                                <td>Asisten Pemerintahan dan Kesejahteraan Rakyat </td>
                                <td>Tim Pertimbangan</td>
                            </tr>

                            <tr>
                                <th scope="row">5</th>
                                <td>ASEP UUS RUSPANDI, S.Sos.M.Si</td>
                                <td>Asisten Perekonomian dan Pembangunan </td>
                                <td>Tim Pertimbangan</td>
                            </tr>
                            
                            <tr>
                                <th scope="row">6</th>
                                <td>BUDI RAHMAN, S.SOS.,M.SI</td>
                                <td>Asisten Administrasi Umum</td>
                                <td>Tim Pertimbangan</td>
                            </tr>

                            <tr>
                                <th scope="row">7</th>
                                <td>AGUS SUYAMAN, S. H, M. H.</td>
                                <td>Plt. Kepala Bagian Hukum Setda</td>
                                <td>Tim Pertimbangan Pelayanan Informasi</td>
                            </tr>

                            <tr>
                                <th scope="row">8</th>
                                <td>DADANG SULAEMAN, S.SOS. M.KES, CGCAE</td>
                                <td>Inspektur Daerah </td>
                                <td>Tim Pertimbangan Pelayanan Informasi</td>

                            </tr>
                            
                            <tr class="section-header">
                                <th colspan="4">PPID UTAMA</th>
                            </tr>

                            <tr>
                                <th scope="row">9</th>
                                <td>Drs. H. SONSON MUKHAMAD NURIKHSAN, M. Si</td>
                                <td>Kepala Dinas Komunikasi, Informatika, Persandian dan Statistik Kab. Sumedang </td>
                                <td>PPID UTAMA</td>
                            </tr>

                         
                            <tr class="section-header">
                                <th colspan="4">Sekretariat Pengelola Layanan Informasi dan Dokumentasi</th>
                            </tr>

                            <tr>
                                <th scope="row">10</th>
                                <td>Arief Syamsudin, S. Pd., M.T.</td>
                                <td>Sekretaris Dinas Komunikasi, Informatika, Persandian dan Statistik Kab. Sumedang </td>
                                <td>Koordinator</td>
                            </tr>

                            <tr>
                                <th scope="row">11</th>
                                <td>Nenden Wardani, S. IP, M. Si</td>
                                <td>Subag Umum, Aset dan Kepegawaian pada Diskominfosanditik Kab. Sumedang</td>
                                <td>Anggota</td>
                            </tr>
                            
                             <tr>
                                <th scope="row">12</th>
                                <td>Raden Felly Afianly, SE</td>
                                <td>Subag Keuangan pada Diskominfosanditik Kab. Sumedang</td>
                                <td>Anggota</td>
                            </tr>
                            
                              <tr>
                                <th scope="row">13</th>
                                <td>Pelaksana Pada Sekretariat Diskominfosanditik Kab. Sumedang</td>
								<td></td>
                                <td>Anggota</td>
                            </tr>
                            <tr class="section-header">
                                <th colspan="4">Bidang Pelayanan Informasi dan Dokumentasi</th>
                            </tr>
                            <tr>
                                <th scope="row">14</th>
                                <td>Erick Febriana, S. Sn.</td>
                                <td>Kepala Bidang Informasi dan Komunikasi Publik Diskominfosanditik Kab. Sumedang</td>
                                <td>Koordinator</td>
                            </tr>
                            
                            <tr>
                                <th scope="row">15</th>
                                <td>TETEN KURNIADI, ST, MM.</td>
                                <td>Kepala Bidang Informatika Diskominfosanditik Kab.Sumedang</td>
                                <td>Anggota</td>
                            </tr>
                            <tr>
                                <th scope="row">16</th>
                                <td>Jabatan Fungsional Pada Bidang Informatika Diskominfosanditik Kabupaten Sumedang</td>
                                <td>-</td>
                                <td>Anggota</td>
                            </tr>
                            <tr>
                                <th scope="row">17</th>
                                <td>Pelaksana Pada Bidang Informasi dan Komunikasi Publik Diskominfosanditik Kab. Sumedang</td>
                                <td>-</td>
                                <td>Anggota</td>
                            </tr>
                            <tr class="section-header">
                                <th colspan="4">Bidang Pengolah Data dan Klasifikasi</th>
                            </tr>
                            <tr>
                                <th scope="row">18</th>
                                <td>Hj. Yuyun Yusiva Wahyuningsih, SE, MM.</td>
                                <td>Kepala Bidang Statistik Diskominfosanditik Kab. Sumedang</td>
                                <td>Koordinator</td>
                            </tr>
                            <tr>
                                <th scope="row">19</th>
                                <td>ELLAN ROHELAN NAGARI S. Si</td>
                                <td>Kepala Bidang Penelitian, Pengembangan dan Evaluasi Pembangunan pada BAPPPPEDA Kabupaten Sumedang</td>
                                <td>Anggota</td>
                            </tr>
							<tr>
                                <th scope="row">20</th>
                                <td>Kusnandar, S. Sos.</td>
                                <td>Kepala bidang Kearsipan pada Dinas Arsip dan Perpustakaan Kabupaten Sumedang</td>
                                <td>Anggota</td>
                            </tr>
							<tr>
                                <th scope="row">21</th>
                                <td>Usep Yusup, SE, MM.</td>
                                <td>Kepala Sub Bidang Pendataan dan Penilaian Pada Badan Pendapatan Daerah Kabupaten Sumedang</td>
                                <td>Anggota</td>
                            </tr>
							<tr>
                                <th scope="row">22</th>
                                <td>Pelaksana Pada Diskominfosanditik Kabupaten Sumedang</td>
                                <td></td>
                                <td>Anggota</td>
                            </tr>
                            <tr class="section-header">
                                <th colspan="4">Bidang Fasilitasi Sengketa Informasi</th>
                            </tr>
                            <tr>
                                <th scope="row">23</th>
                                <td>Mamat Rohimat, S. Pd., M. Pd.</td>
                                <td>Kepala Bidang Keamaman Informasi dan Persandian pada Diskominfosanditik Kab. Sumedang </td>
                                <td>Koordinator</td>
                            </tr>
							
                            <tr>
                                <th scope="row">24</th>
                                <td>NETI HERAWATI, S. IP.ME</td>
                                <td>Kepala Bidang Pengembangan Kompetensi dan Kinerja ASN pada BKPSDM Kabupaten Sumedang</td>
                                <td>Anggota</td>
                            </tr>
                            
                             <tr>
                                <td scope="row">25</td>
                                <td>Yoyoh Maryanah Siti Syadiah, SE, MM.</td>
                                <td> Kepala Bidang Akuntansi pada Badan Keuangan dan Aset Daerah Kabupaten Sumedang</td>
                                <td>Anggota</td>
                            </tr>
							
							<tr>
                                <td scope="row">26</td>
                                <td>Jabatan Fungsional pada Bagian Hukum Sekretariat Daerah Kabupaten Sumedang</td>
                                <td>-</td>
                                <td>Anggota</td>
                            </tr>
                            </tbody>
                        </table>
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

</body>




</html>
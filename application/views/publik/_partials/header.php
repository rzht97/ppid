 <!--::header part start::-->
 <header class="main_menu home_menu">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-12">
                 <nav class="navbar navbar-expand-lg navbar-light">
                     <a class="navbar-brand" href="index.html"> <img src="<?php echo base_url('img/logo_sumedang.gif') ?>" width=50 alt="logo"> </a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="menu_icon"><i class="fas fa-bars"></i></span>
                     </button>

                     <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                         <ul class="navbar-nav">
                             <li class="nav-item">
                                 <a class="nav-link" href="<?php echo site_url('publik/overview') ?>">Home</a>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toogle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Profil
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/profil') ?>">Tentang Kami</a>
                                     <a class="dropdown-item" href="#">Profil Kepala Daerah</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/visimisi') ?>">Visi dan Misi</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/urtug') ?>">Uraian Tugas</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/maklumat') ?>">Maklumat Pelayanan</a>
                                     <a class="dropdown-item" href="#">Laporan Layanan Informasi dan Dokumentasi Tahun 2020</a>
                                     <a class="dropdown-item" href="#">Laporan Layanan Informasi dan Dokumentasi Tahun 2021</a>
                                 </div>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Daftar Informasi
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/inpub') ?>">Daftar Informasi Publik</a>
                                     <a class="dropdown-item" target="_blank" href="https://opendata.sumedangkab.go.id">Open Data</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/berkala') ?>">Berkala</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/sertamerta') ?>">Serta Merta</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/setiapsaat') ?>">Setiap Saat</a>

                                 </div>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Regulasi
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/regulasi') ?>"> Regulasi Informasi Publik</a>
                                     <a class="dropdown-item" target="_blank" href="http://jdih.sumedangkab.go.id/">Dokumentasi dan Informasi Hukum Kab Sumedang</a>
                                 </div>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Pelayanan Informasi
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                     <a class="dropdown-item" href="<?php echo site_url('publik/login') ?>">Permohonan Informasi</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/caradapatinfo') ?>">Tata Cara Mendapatkan Informasi</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/carakeberatan') ?>">Tata Cara Pengajuan Keberatan</a>
									 <a class="dropdown-item" href="<?php echo site_url('publik/overview/sengketa') ?>">Prosedur Penanganan Sengketa Informasi</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/sop') ?>">SOP Pelayanan Informasi PPID</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/ditolak') ?>">Informasi Alasan Penolakan Pelayanan Permintaan Informasi</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/keberatan') ?>">Informasi Upaya atas Tidak Puas Jawaban Keberatan Informasi Publik</a>
                                 </div>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     Media
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                     <a class="dropdown-item" target="_blank" href="https://sumedangkab.go.id/berita/load">Berita</a>
                                     <a class="dropdown-item" href="<?php echo site_url('publik/overview/galeri') ?>">Galeri</a>
                                 </div>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" target = "_blank" href="http://lapor.go.id/">Lapor</a>
                             </li>

                         </ul>
                     </div>
                     <a class="btn_1 d-none d-lg-block" href="<?php echo site_url('admin/overview') ?>">Admin</a>
                 </nav>
             </div>
         </div>
     </div>
 </header>
 <!-- Header part end-->
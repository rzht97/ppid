<header class="main-header clearfix">
            <nav class="main-menu clearfix">
                <div class="main-menu-wrapper clearfix">
                    <div class="main-menu-wrapper__left">
                        <div class="main-menu-wrapper__logo">
                            <a href="index-2.html"><img src="<?= base_url() ?>newestassets/images/logo/logo_sumedang.png" width="50" alt=""></a>
                        </div>
                        <div class="main-menu-wrapper__main-menu">
                            <a href="#" class="mobile-nav__toggler">
                                <span class="mobile-nav__toggler-bar"></span>
                                <span class="mobile-nav__toggler-bar"></span>
                                <span class="mobile-nav__toggler-bar"></span>
                            </a>
                            <ul class="main-menu__list">
                                <li class="dropdown">
                                    <a href="#">Profil</a>
                                    <ul>
										<li class="dropdown">
                                            <a href="#">Visi dan Misi</a>
                                            <ul>
                                                <li><a href="<?php echo site_url('pub/profil/visimisikab')?>">Kabupaten Sumedang</a></li>
                                                <li><a href="<?php echo site_url('pub/profil/visimisippid')?>">PPID</a></li>
                                            </ul>
                                        </li>
										<li><a href = "<?php echo site_url('pub/profil/strukturorg')?>">Struktur Organisasi</a></li>
                                        <li><a href="<?php echo site_url('pub/profil/urtug')?>">Tugas dan Wewenang</a></li>
										<!--<li><a href="<?php echo site_url('pub/overview/pejabat')?>">Profil Pejabat Struktural</a></li>-->
                                        <li><a href="<?php echo site_url('pub/profil/maklumat')?>">Maklumat Pelayanan</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Informasi Publik</a>
                                    <ul>
										<li class="dropdown">
                                            <a href="#">Daftar Informasi Publik</a>
                                            <ul>
                                                <li><a href="<?php echo site_url('pub/overview/skdip')?>">SK DIP</a></li>
                                                <li><a href="<?php echo site_url('pub/dip')?>">DIP</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo site_url('pub/overview/dik')?>">Daftar Informasi Yang Dikecualikan</a></li>
										<li><a href = "<?php echo site_url('pub/overview/cc')?>">Command Center</a></li>
                                        <li><a href="<?php echo site_url('pub/overview/Laporan')?>">Laporan Pelayanan Informasi Publik</a>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Regulasi</a>
                                    <ul>
                                        <li><a href="<?php echo site_url('pub/overview/regulasi')?>">Regulasi Informasi Publik</a></li>
                                        <li><a target = "_blank" href="https://jdih.sumedangkab.go.id">Dokumentasi dan Informasi Hukum Kab. Sumedang</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Pelayanan Informasi</a>
                                    <ul>
                                        <li><a href="<?php echo site_url('pub/overview/caradapatinfo')?>">Tata Cara Mendapatkan Informasi</a></li>
                                        <li><a href="<?php echo site_url('pub/overview/carakeberatan')?>">Tata Cara Pengajuan Keberatan</a></li>
                                        <li><a href="<?php echo site_url('pub/overview/carasengketa')?>">Prosedur Penanganan Sengketa Informasi</a></li>
										<li><a href="<?php echo site_url('pub/overview/sop')?>">SOP Pelayanan Informasi</a></li>
										<li><a href="<?php echo site_url('pub/overview/standarbiaya')?>">Standar Biaya Pelayanan</a></li>
										<li><a target = "__blank" href="https://wa.me/6281122202220?text=#Simpati">WA KEPO</a></li>
										
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Media</a>
                                    <ul>
                                        <li><a href="<?php echo site_url('berita')?>">Berita</a></li>
                                        <li><a href="#">Galeri</a></li>
                                    </ul>
                                </li>
								<li>
                                    <a target = "blank_" href="<?php echo site_url('pub/cekstatus')?>">Cek Status</a>

                                </li>
								<li>
                                    <a target = "blank_" href="<?php echo site_url('pub/overview/lapor')?>">LAPOR!</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu-wrapper__right">
                        <div class="main-menu-wrapper__search-box">
                            <a href="<?php echo site_url('pub/permohonan/permohonan')?>" class="thm-btn">Ajukan Permohonan</a>
                        </div>
                        <!-- <div class="main-menu-wrapper__phone-contact">
                            <p>Need help? Talk to an expert</p>
                            <a href="tel:+92-666-888-0000">+92 666 888 0000</a>
                        </div> -->
                    </div>
                </div>
            </nav>
        </header>
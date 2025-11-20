<style>
    /* Custom styling for Ajukan Permohonan button */
    .btn-ajukan-permohonan {
        position: relative;
        display: inline-block;
        vertical-align: middle;
        -webkit-appearance: none;
        border: none;
        outline: none !important;
        background-color: var(--thm-primary);
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 14px 28px;
        margin-left: 30px;
        border-radius: 6px;
        transition: all 0.3s ease;
        letter-spacing: 0.03em;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.12);
        text-decoration: none;
        line-height: 1.4;
        white-space: nowrap;
    }

    .btn-ajukan-permohonan:hover {
        background: var(--thm-base);
        color: var(--thm-primary) !important;
        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.18);
        text-decoration: none;
    }

    .btn-ajukan-permohonan:active {
        transform: translateY(0);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
    }

    /* Better spacing for the button container */
    .main-menu-wrapper__search-box {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .btn-ajukan-permohonan {
            padding: 12px 24px;
            font-size: 12px;
            margin-left: 20px;
        }
    }

    @media (max-width: 991px) {
        .btn-ajukan-permohonan {
            padding: 10px 20px;
            font-size: 11px;
            margin-left: 15px;
        }
    }

    @media (max-width: 767px) {
        .btn-ajukan-permohonan {
            padding: 10px 18px;
            font-size: 11px;
            margin-left: 10px;
        }
    }
</style>

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
                            <a href="<?php echo site_url('pub/permohonan/permohonan')?>" class="btn-ajukan-permohonan">Ajukan Permohonan</a>
                        </div>
                        <!-- <div class="main-menu-wrapper__phone-contact">
                            <p>Need help? Talk to an expert</p>
                            <a href="tel:+92-666-888-0000">+92 666 888 0000</a>
                        </div> -->
                    </div>
                </div>
            </nav>
        </header>
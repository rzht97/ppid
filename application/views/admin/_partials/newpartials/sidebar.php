<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PPID Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('admin/overview')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/berita') ?>" >
                    <i class="fas fa-fw fa-image"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/dokumen') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Dokumen</span>
                </a>
            </li>
			<!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/user/tempuser') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pengajuan Akun</span>
                </a>
            </li>
	
			<!-- Nav Item - Informasi Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Informasi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo site_url('admin/info') ?>">Daftar Informasi</a>
                        <!--<a class="collapse-item" href="<?php echo site_url('admin/info/belumproses') ?>">Belum Diproses</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/info/sedangproses') ?>">Sedang Diproses</a>
						<a class="collapse-item" href="<?php echo site_url('admin/info/sudahproses') ?>">Sudah Diproses</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/info/ditolak') ?>">Ditolak</a>-->
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/user/user') ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Daftar User</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
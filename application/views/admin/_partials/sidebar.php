
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
   


    <!-- Berita -->
         <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Galeri</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/berita/add') ?>">Tambah</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/berita') ?>">Daftar</a>
        </div>
    </li>
		
    <!-- dokumen -->
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Dokumen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/dokumen/add') ?>">Tambah</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/dokumen') ?>">Daftar</a>
        </div>
    </li>
        

        <!-- user -->
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>User</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user/tempuser') ?>">Daftar Pengajuan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/user/user') ?>">Daftar User </a>
        </div>
    </li>
           

       <!-- user -->
     <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Informasi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/info') ?>">Daftar Informasi</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/info/belumproses') ?>">Belum Diproses </a>
            <a class="dropdown-item" href="<?php echo site_url('admin/info/sedangproses') ?>">Sedang Diproses </a>
            <a class="dropdown-item" href="<?php echo site_url('admin/info/sudahproses') ?>">Sudah Diproses </a>
            <a class="dropdown-item" href="<?php echo site_url('admin/info/ditolak') ?>">Ditolak </a>
        </div>
    </li>


	
    
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>

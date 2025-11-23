<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="<?= base_url()?>/inverse/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            PPID Utama <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu animated flipInY" style="min-width: 200px; background-color: #fff; border: 1px solid #ddd;">
                            <li>
                                <a href="<?php echo base_url('index.php/login/logout'); ?>" style="color: #333; padding: 10px 20px; display: block; text-decoration: none; font-size: 14px;">
                                    <i class="fa fa-power-off" style="margin-right: 8px;"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"> <i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="nav-small-cap m-t-10">--- MAIN MENU</li>
                    <li>
                        <a href="<?php echo site_url('admin/index')?>" class="waves-effect">
                            <i class="fa fa-dashboard fa-fw"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/dip')?>" class="waves-effect">
                            <i class="fa fa-list-alt fa-fw"></i>
                            <span class="hide-menu">Daftar Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/permohonan')?>" class="waves-effect">
                            <i class="fa fa-file-text fa-fw"></i>
                            <span class="hide-menu">Permohonan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/keberatan')?>" class="waves-effect">
                            <i class="fa fa-exclamation-circle fa-fw"></i>
                            <span class="hide-menu">Permohonan Keberatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/sengketa')?>" class="waves-effect">
                            <i class="fa fa-gavel fa-fw"></i>
                            <span class="hide-menu">Sengketa</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
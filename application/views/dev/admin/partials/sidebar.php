<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="<?= base_url()?>/inverse/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PPID Utama <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <!--<li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>-->
                            <li><a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li><a href="#" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Dashboard</span></a></li>
                    <li><a href="#" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Daftar User</span></a>
                    </li>
                    <li> <a href="#" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Pengajuan Akun</span></a>
                        <!--<ul class="nav nav-second-level">
                            <li><a href="panels-wells.html">Panels and Wells</a></li>
                            <li><a href="panel-ui-block.html">Panels With BlockUI</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="sweatalert.html">Sweat alert</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="grid.html">Grid</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                            <li><a href="tab-stylish.html">Stylish Tabs</a></li>
                            <li><a href="modals.html">Modals</a></li>
                            <li><a href="progressbars.html">Progress Bars</a></li>
                            <li><a href="notification.html">Notifications</a></li>
                            <li><a href="carousel.html">Carousel</a></li>
                            <li><a href="list-style.html">List & Media object</a></li>
                            <li><a href="user-cards.html">User Cards</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="timeline-horizontal.html">Horizontal Timeline</a></li>
                            <li><a href="nestable.html">Nesteble</a></li>
                            <li><a href="range-slider.html">Range Slider</a></li>
                            <li><a href="tooltip-stylish.html">Stylish Tooltip</a></li>
                            <li><a href="bootstrap.html">Bootstrap UI</a></li>
                        </ul>-->
                    </li>
                    <li> <a href="<?php echo site_url('admin/dip')?>" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Daftar Informasi</span></a>
                    </li>
                    <li> <a href="<?php echo site_url('admin/permohonan')?>" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Permohonan</span></a>
                        <!--<ul class="nav nav-second-level">
                            <li><a href="panels-wells.html">Panels and Wells</a></li>
                            <li><a href="panel-ui-block.html">Panels With BlockUI</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                        </ul>-->
                    </li>
				    <li> <a href="<?php echo site_url('admin/keberatan')?>" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Permohonan Keberatan</span></a>
					<li> <a href="<?php echo site_url('admin/sengketa')?>" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Sengketa</span></a>
					<li> <a href="<?php echo site_url('admin/berita')?>" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Berita PPID</span></a>
                </ul>
            </div>
        </div>
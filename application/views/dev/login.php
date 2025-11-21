<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - PPID Kabupaten Sumedang</title>
    <?php $this->load->view("dev/partials/head.php") ?>

    <style>
        .login-register { background: #f5f5f5; }
        .login-box .white-box { background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); padding: 25px; }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" action="<?php echo base_url('login/aksi_login'); ?>" method="post">
                    <h3 class="box-title m-b-20">Login Admin PPID Kab. Sumedang</h3>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" id="inputEmail" required="required" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="inputPassword" required="required" placeholder="Password" name="password">
                        </div>
                    </div>
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Login</button>
                </form>

            </div>
        </div>
    </section>
    <!-- jQuery -->
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
    <!--Style Switcher -->
    <script src="<?= base_url() ?>inverse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
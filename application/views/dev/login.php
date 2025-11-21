<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - PPID Kabupaten Sumedang</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>inverse/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url() ?>inverse/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>inverse/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url() ?>inverse/css/colors/default.css" rel="stylesheet">

    <style>
        .login-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .login-box .white-box {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 40px 30px;
        }
        .box-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .form-control {
            height: 45px;
            border-radius: 8px;
        }
        .btn-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            height: 45px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .btn-info:hover {
            background: linear-gradient(135deg, #5a6fd6 0%, #6a4190 100%);
        }
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
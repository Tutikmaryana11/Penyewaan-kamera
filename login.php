<?php
session_start();
//cek session dulu, kalau ada session username dan password maka redirect page ke halaman utama
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

    echo "<script>document.location.href='main/index.php?view=home';</script>";

}
//jika session tidak ditemukan maka kembali ke halaman login
else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sistem Informasi Sewa Camera -- Mono Train Photo</title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Masuk ke Aplikasi</h3>
                        </div>
                        

                        <div class="panel-body">
                            <?php if ($_GET['view']=='loginError') {?>
                            <div class="form-group">

                                <div class="alert alert-danger alert-dismissable" style="display: block;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    Maaf username dan password yang masukan tidak sesuai.
                                </div>
                            </div>
                        <?php } ?>
                            <form role="form" action="main/proses/login/login.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="user_username" type="text" autofocus required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block"></input>

                                </fieldset>

                            </form>
                            <hr>
                            <div class="form-group">
                                <label>
                                    <!-- <span class="alert alert-info"></span> -->
                                    <div class="alert alert-info alert-dismissable" style="display: block;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Pastikan username dan password telah terdaftar
                                    </div>
                                    <span>Jika belum punya akun, silakan daftar <a href="register.php?task=register"> <b>DISINI</b></a></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="assets/dist/js/sb-admin-2.js"></script>

    </body>

    </html>

<?php } ?>


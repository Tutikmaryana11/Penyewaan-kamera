
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
                            <h3 class="panel-title">Register ke Aplikasi</h3>
                        </div>
                       
                        <div class="panel-body">
                             <?php if ($_GET['task']=='passwordNotMatch') {?>
                            <div class="form-group">

                                <div class="alert alert-danger alert-dismissable" style="display: block;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    Maaf password yang anda masukan tidak sama.
                                </div>
                            </div>
                       <?php } else if ($_GET['task']=='registerDone') {?>
                             <div class="alert alert-success alert-dismissable" style="display: block;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Selamat, akun anda telah terdaftar, silakan <a href="login.php?view=loginApps"> <b>login</b></a> untuk melanjutkan transaksi.
                                    </div>
                       <?php  } ?>
                            <form role="form" action="main/proses/login/register.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="user_username" type="text" autofocus required="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Re-type Password" name="user_password2" type="password" value="">
                                    </div>

                                     <div class="form-group">
                                        <input class="form-control" placeholder="Keterangan" name="user_info" type="text" value="">
                                    </div>
                                    <input type="hidden" name="user_level" value="0">

                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block"></input>

                                </fieldset>

                            </form>
                            <hr>
                            <div class="form-group">

                                <div class="alert alert-info alert-dismissable" style="display: block;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    Kembali ke halaman <a href="login.php?view=loginStart"><b>LOGIN</b></a>.
                                </div>
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


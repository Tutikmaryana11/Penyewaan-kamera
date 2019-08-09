<?php 
$penyewaan = mysql_num_rows(mysql_query("select * from sewa where sewa_id_user = $_SESSION[user_id] "));
$pembayaran = mysql_num_rows(mysql_query("select * from bayar b join sewa s on s.sewa_id = b.bayar_sewa_id where s.sewa_id_user = $_SESSION[user_id]"));
?> 

 <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
      <!-- UNTUK ROW ADA DISNI, SELAMAT DATANG -->
                <div class="row">
        <div class="col-lg-12">
         <div class="jumbotron" align="center">
            <h2>Selamat Datang</h2>
            <!-- <p>DI</p> -->
            <h2 style="color: #d9534f">Mono Train Photo</h2>
            <p><a class="btn btn-primary btn-lg" role="button" href="index.php?view=penyewaan_user&status=more">Learn more</a>
            </p>
        </div>
    </div>
    <!-- /.col-lg-8 -->
</div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-dollar fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $pembayaran;?></div>
                            <div>Pembayaran</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?view=pembayaran_user">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-th-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $penyewaan?></div>
                            <div>penyewaan</div>
                        </div>
                    </div>
                </div>
                <a href="index.php?view=penyewaan_user">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
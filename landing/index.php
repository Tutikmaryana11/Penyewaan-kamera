<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Sewa Camera -- Mono Train Photo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Mono Train Photo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#pelayanan">Pelayanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#alat">Camera</a>
            </li>
       
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#kontak">Kontak</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#masuk">masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>SELAMAT DATANG DI <br>MONO TRAIN PHOTO</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Mono Train Photo merupakan perusahaan yang bekerja di penyewaan camera yang berada didomisili Jawa Tengah dan sekitarnya.</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#tentang">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="tentang">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Siapa itu Mono Train Photo?</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Mono Train Photo merupakan perusahaan yang bekerja di penyewaan camera yang berada didomisili Jawa Tengah dan sekitarnya. Monotrain Photo merupakan salah satu persewaan camera terbaik di Jawa Tengah dan sekitarnya.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#pelayanan">Pelayanan Kami</a>
          </div>
        </div>
      </div>
    </section>

    <section id="pelayanan">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Pelayanan Kami?</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Alat Lengkap</h3>
              <p class="text-muted mb-0">Kami memiliki alat yang cukup lengkap dengan jumlah yang cukup</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Penyewaan mudah</h3>
              <p class="text-muted mb-0">Anda dapat menyewa peralatan dengan mudah dan cepat</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Harga bersaing</h3>
              <p class="text-muted mb-0">Harga yang kami tawarkan sangat cocok dan mampu bersaing</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Pelayanan terbaik</h3>
              <p class="text-muted mb-0">Anda berhak mendapatkan pelayanan terbaik dari kami</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="alat">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">

          <?php 
          include '../main/database/connection.php';
          $sql = mysql_query("SELECT ab.cm_nama, kt.kategori_nama, ab.cm_keterangan, ab.cm_foto from camera ab join kategori kt on kt.kategori_id = ab.cm_kategori_id");
          while ($data = mysql_fetch_array($sql)) { 
            // print_r($data);
            ?>
          
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box img-responsive" href="../main/file/<?php echo $data['cm_foto']?>">
              <img class="img-fluid" src="../main/file/<?php echo $data['cm_foto']?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    <?php echo $data['kategori_nama']?>
                  </div>
                  <div class="project-name">
                    <?php echo $data['cm_nama']?>
                    <?php echo $data['cm_keterangan']?>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>


        </div>
      </div>
    </section>

    <section class="bg-dark text-white"  id="masuk">
      <div class="container">
        <div class="row">
      <div class="container text-center" >
        <h2 class="mb-4">Sewa Camera kami sekarang juga!</h2>
        <a class="btn btn-light btn-xl sr-button" href="../login.php?view=start">Login Aplikasi Sekarang</a>
      </div>
    </div>
  </div>
    </section>

    <section id="kontak">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Hubungi Kami Lebih Lanjut</h2>
            <hr class="my-4">
            <p class="mb-5">Jika anda siap untuk melakukan transaksi dengan kami silakan hubungi kami dengan info pelayanan dibawah ini.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">support@monotrainphoto.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>

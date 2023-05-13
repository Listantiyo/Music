<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php $datas = new Globala('brand'); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= BASEPATH;
                                new Globala('logo'); ?>" rel="icon">
  <link href="<?= BASEPATH ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASEPATH ?>css/custom.css" rel="stylesheet">
  <link href="<?= BASEPATH ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEPATH ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASEPATH ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= BASEPATH ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASEPATH ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASEPATH ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->

  <link href="<?= BASEPATH ?>css/main.css" rel="stylesheet">
</head>

<body data-url="<?= BASEPATH; ?>" data-location="<?= $data['location']; ?>">
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img class="logo" src="<?= BASEPATH;
                                new Globala('logo'); ?>" alt="">
        <h1 class="ps-3"><?php new Globala('brand'); ?><span></span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= BASEPATH ?>home" class="nav-home">Home</a></li>
          <li><a href="<?= BASEPATH ?>about" class="nav-about">About</a></li>
          <!-- <li><a href="<?= BASEPATH ?>service/index">Services</a></li> -->
          <li><a href="<?= BASEPATH ?>gallery" class="nav-gallery">Gallery</a></li>
          <li><a href="<?= BASEPATH ?>contact" class="nav-contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">

  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 data-aos="fade-down"><span><?php new Globala('slide_title'); ?></span></h2>
          <p data-aos="fade-up"><?php new Globala('slide_desc'); ?></p>
          <a data-aos="fade-up" data-aos-delay="200" href="#constructions" class="btn-get-started">Our Services</a>
        </div>
      </div>
    </div>
  </div>

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

    <div class="carousel-item active" style="background-image: url(<?= BASEPATH;
                                                                    new Globala('slide_1'); ?>)"></div>
    <div class="carousel-item" style="background-image: url(<?= BASEPATH;
                                                            new Globala('slide_2');  ?>)"></div>
    <div class="carousel-item" style="background-image: url(<?= BASEPATH;
                                                            new Globala('slide_3'); ?>)"></div>

    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>

</section><!-- End Hero Section -->

<!-- ======= Stats Counter Section ======= -->
<section id="stats-counter" class="stats-counter section-bg">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?= $data['packet'];?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Packet</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-card-checklist color-green flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?= $data['service'];?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Services</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-people color-pink flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?= $data['team'];?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Team</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item d-flex align-items-center w-100 h-100">
          <i class="bi bi-images color-blue flex-shrink-0"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?= $data['gallery'];?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Gallery</p>
          </div>
        </div>
      </div><!-- End Stats Item -->

    </div>

  </div>
</section>
<!-- End Stats Counter Section -->

<main id="main">

  <?php

  include_once 'services.php';
  include_once 'benefits.php';
  // include_once 'project.php';
  include_once '../app/views/user/master/testimoni.php';

  ?>

  <!-- Button trigger modal -->
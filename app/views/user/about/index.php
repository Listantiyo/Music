    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= BASEPATH; ?>img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>About</h2>
        <ol>
          <li><a href="<?= BASEPATH; ?>">Home</a></li>
          <li>About</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row position-relative" style="overflow:hidden;">



          <div class="col-lg-6 px-0">
            <div class="our-story">
              <h2><?= htmlentities($data['get_about']['title']); ?></h2>
              <h4><?= htmlentities($data['get_about']['text1']); ?></h4>
              <h3><?= htmlentities($data['get_about']['text2']); ?></h3>

              <p><?= htmlentities($data['get_about']['paragraph']); ?></p>
            </div>
          </div>

          <div class="col-lg-6 about-img" style="background-image: url(<?= BASEPATH;
                                                                        echo htmlentities($data['get_about']['path']); ?>);"></div>
        </div>


      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>

        </div>

        <div class="row gy-5">
          <?php foreach ($data['get_team'] as $value) : ?>
            <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?= BASEPATH;
                          echo $value['path']; ?>" class="img-fluid" alt="">
                <div class="social">
                  <?php if (isset($value['twitter']) && $value['twitter'] != null) : ?>
                    <a href="<?= $value['twitter']; ?>"><i class="bi bi-twitter"></i></a>
                  <?php endif; ?>
                  <?php if (isset($value['facebook']) && $value['facebook'] != null) : ?>
                    <a href="<?= $value['facebook']; ?>"><i class="bi bi-facebook"></i></a>
                  <?php endif; ?>
                  <?php if (isset($value['instagram']) && $value['instagram'] != null) : ?>
                    <a href="<?= $value['instagram']; ?>"><i class="bi bi-instagram"></i></a>
                  <?php endif; ?>
                  <?php if (isset($value['linkedin']) && $value['linkedin'] != null) : ?>
                    <a href="<?= $value['linkedin']; ?>"><i class="bi bi-linkedin"></i></a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="member-info text-center">
                <h4><?= $value['name'] ?></h4>
                <span><?= $value['title'] ?></span>

              </div>
            </div><!-- End Team Member -->
          <?php endforeach; ?>
        </div>

      </div>
    </section><!-- End Our Team Section -->

    <?php include_once '../app/views/user/master/testimoni.php'; ?>
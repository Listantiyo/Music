    <!-- ======= Benefits Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Services</h2>
          <p><?php new Globala('service_desc') ?></p>
        </div>

        <div class="row gy-4">
          <?php $delay = 100;
          foreach ($data['get_service'] as $value) : ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay; ?>">
              <div class="service-item  position-relative">
                <div class="icon">
                  <i class="fa-solid fa-<?= $value['icon']; ?>"></i>
                </div>
                <h3><?= $value['title']; ?></h3>
                <p><?= $value['descrb']; ?></p>
              </div>
            </div><!-- End Service Item -->
          <?php $delay += 150;
          endforeach; ?>
        </div>

      </div>
    </section>
    <!-- End Benefits Section -->
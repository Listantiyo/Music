    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p><?php new Globala('testimoni_desc') ?></p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">
            <?php foreach ($data['testimoni'] as $value) : ?>
              <div class="swiper-slide">
                <div class="testimonial-wrap">
                  <div class="testimonial-item">
                    <h3><?= $value['name']; ?></h3>
                    <h4><?= $value['title']; ?></h4>

                    <div class="stars">
                      <?php for ($i = 0; $i < $value['star']; $i++) : ?>
                        <i class="bi bi-star-fill"></i>
                      <?php endfor; ?>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <?= $value['descrb']; ?>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div><!-- End testimonial item -->
            <?php endforeach; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
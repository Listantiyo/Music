    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php new Globala('slide_2', true) ?>');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Gallery</h2>
        <ol>
          <li><a href="<?= BASEPATH; ?>">Home</a></li>
          <li>Gallery</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
          <!-- 
          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-remodeling">Remodeling</li>
            <li data-filter=".filter-construction">Construction</li>
            <li data-filter=".filter-repairs">Repairs</li>
            <li data-filter=".filter-design">Design</li>
          </ul> 
        -->
          <!-- End Projects Filters -->
          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <? var_dump($data['get_images']) ?>
            <?php foreach ($data['get_images'] as $value) : ?>
              <a href="<?php if (isset($value['path'])) echo BASEPATH;
                        echo $value['path']; ?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">

                <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                  <div class="portfolio-content h-100">
                    <img src="<?php if (isset($value['path'])) echo BASEPATH;
                              echo $value['path']; ?>" class="img-fluid" alt="">
                  </div>
                </div>

              </a>
              <!-- End Projects Item -->
            <?php endforeach; ?>

          </div>
          <!-- End Projects Container -->
        </div>
      </div>
    </section><!-- End Our Projects Section -->
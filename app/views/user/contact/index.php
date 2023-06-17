    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php new Globala('slide_3', true) ?>');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Contact</h2>
        <ol>
          <li><a href="<?= BASEPATH; ?>">Home</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">


        <div class="row gy-4 mt-1">

          <div class="col-lg-6 text-center" style="border:0; width: 100%; height: 384px;">
            <i style="font-size:12rem;" class="bi bi-envelope-open-heart"></i>
            <p> If you need help, please <a href=""> contact us </a> . To share product feedback on our products, please <a href="">visit our community here</a> . </p>
          </div>

          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-map"></i>
                <h3>Address</h3>
                <p><?php new Globala('addres'); ?></p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
              <div class="info-item d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p><?php new Globala('email'); ?></p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
              <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p><?php new Globala('phone'); ?></p>
              </div>
            </div><!-- End Info Item -->

          </div>
          <div class="row gy-4 mt-1">

            <div class="col-lg-12">
              <form action="" id="contact-us" method="post" role="form" class="php-email-form">
                <div class="row gy-4">
                  <div class="col-lg-6 form-group">
                    <input type="text" name="first-name" class="form-control" id="name" placeholder="Your First Name" required>
                  </div>
                  <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" name="last-name" id="email" placeholder="Your Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center"><button type="button">Send Message</button></div>
              </form>
            </div>
          </div>


        </div>
    </section><!-- End Contact Section -->
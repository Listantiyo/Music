</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="footer-content position-relative">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6">
          <div class="footer-info">
            <h3><?php new Globala('brand'); ?></h3>
            <p class="show-addres"><?php new Globala('addres'); ?></p>
            <br><br>
            <strong>Phone:</strong> <?php new Globala('phone'); ?><br>
            <strong>Email:</strong> <?php new Globala('email'); ?><br>

            <div class="social-links d-flex mt-3">
              <a target="_blank" href="<?php new Globala('twitter'); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-tiktok"></i></a>
              <a target="_blank" href="<?php new Globala('facebook'); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
              <a target="_blank" href="<?php new Globala('instagram'); ?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
              <!-- <a target="_blank" href="<?php /* new Globala('linkedin');  */?>" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a> -->
            </div>
          </div>
        </div><!-- End footer info column-->

      </div>
    </div>
  </div>

  <div class="footer-legal text-center position-relative">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>UpConstruction</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>
  </div>

</footer>
<!-- End Footer -->



<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>


<!-- Vendor JS Files -->
<script src="<?= BASEPATH; ?>admin-res/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEPATH; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEPATH; ?>vendor/aos/aos.js"></script>
<script src="<?= BASEPATH; ?>vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= BASEPATH; ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= BASEPATH; ?>vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= BASEPATH; ?>vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= BASEPATH; ?>vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= BASEPATH; ?>js/main.js"></script>
<script src="<?= BASEPATH; ?>js/custom.js"></script>


<script>
  var lightbox = GLightbox();
  lightbox.on('open', (target) => {
    console.log('lightbox opened');
  });
  var lightboxDescription = GLightbox({
    selector: '.glightbox2'
  });
  var lightboxVideo = GLightbox({
    selector: '.glightbox3'
  });
  lightboxVideo.on('slide_changed', ({
    prev,
    current
  }) => {
    console.log('Prev slide', prev);
    console.log('Current slide', current);

    const {
      slideIndex,
      slideNode,
      slideConfig,
      player
    } = current;

    if (player) {
      if (!player.ready) {
        // If player is not ready
        player.on('ready', (event) => {
          // Do something when video is ready
        });
      }

      player.on('play', (event) => {
        console.log('Started play');
      });

      player.on('volumechange', (event) => {
        console.log('Volume change');
      });

      player.on('ended', (event) => {
        console.log('Video ended');
      });
    }
  });

  var lightboxInlineIframe = GLightbox({
    selector: '.glightbox4'
  });
</script>

<script>
  $(function() {
    let textAddres = $('.show-addres').html();
    $('.show-addres').html(textAddres.replace(/(?:\r\n|\r|\n)/g, '<br>'));

    let textAbout = $('.show-about').html();
    $('.show-about').html(textAbout.replace(/(?:\r\n|\r|\n)/g, '<br>'));

  });
</script>
</body>

</html>
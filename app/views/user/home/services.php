<!-- ======= Services Section ======= -->
<section id="constructions" class="constructions">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Services</h2>
      <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem
        dolore earum</p>
    </div>

    <div class="row gy-4">
      <!--  -->
      <?php foreach ($data['get_packet'] as $value) : ?>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card-item">
            <div class="row">
              <div class="col-xl-5 service-img">
                <div class="card-bg service-bg" style="background-image: url(<?= BASEPATH;
                                                                              echo $value['path']; ?>);"></div>
              </div>
              <div class="col-xl-7 d-flex align-items-center">

                <div class="card-body">
                  <h4 class="card-title fs-6"><?= $value['title']; ?></h4>
                  <p><?= $value['descrb']; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-item custom-service">
            <div class="row ">

              <button id="packet-list-show" class="btn-service btn btn-light " data-packet-name="<?= $value['title']; ?>" data-url="<?= BASEPATH; ?>" data-bs-toggle="modal" data-id-packet="<?= $value['id']; ?>" data-bs-target="#exampleModal"><?= $value['count_used']; ?> Package</button>
              <div class="p-4">
              </div>

            </div>
          </div>
        </div><!-- End Card Item -->
      <?php endforeach; ?>


    </div>

  </div>
  <!-- Modal Packet-List-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content" style="z-index:1000">
        <div class="modal-header">
          <h5 class="modal-title text-warning packet-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="accordion packet-list" id="accordionExample">

            <!-- //? for packet list -->

          </div>
          <div class="modal-footer">
            <button class="btn btn-success">Contact Us</button>
          </div>
        </div>
      </div>
    </div>
</section>

<!--  End Services Section -->
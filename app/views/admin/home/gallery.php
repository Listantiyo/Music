<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gallery</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <form action="<?= BASEPATH; ?>admin/gallery/tambah" method="post" enctype="multipart/form-data">
      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="file" class="custom-file-input" id="inputGroupFileGallery">
          <label class="custom-file-label" for="inputGroupFileGallery">Pilih gambar</label>
        </div>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="sumbit" id="inputGroupFileAddon04">Tambah</button>
        </div>
      </div>
    </form>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="text-center">
        <?php foreach ($data['get_gallery'] as $value) : ?>
          <div class="gallery">
            <a target="_blank" href="<?= BASEPATH;
                                      echo $value['path']; ?>">
              <img src="<?= BASEPATH;
                        echo $value['path']; ?>" alt="Cinque Terre" width="600" height="400">
            </a>
            <form class="hapus" action="<?= BASEPATH; ?>admin/gallery/delete" method="post">
              <input type="hidden" name="id_image" value="<?= $value['id'] ?>">
              <input type="hidden" name="path" value="<?= $value['path'] ?>">
              <div class="desc"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
            </form>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
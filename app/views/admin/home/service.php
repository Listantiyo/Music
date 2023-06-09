<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Service</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a onclick="createService()" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalService">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Service</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            <td>No</td>
            <td class="text-center">Icon</td>
            <td style="width: 11rem;" class="text-center">Title</td>
            <td>Describe</td>
            <td style="width: 6rem;" class="text-center">Options</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_service'] as $value) : ?>
            <tr>
              <td><?= $idx; ?></td>
              <td class="text-center">
                <i class="fas fa-<?= $value['icon']; ?>"></i>
              </td>
              <td><?= $value['title']; ?></td>
              <td><?= $value['descrb']; ?></td>
              <td class="text-center">
                <button class="btn btn-sm btn-warning team-button update" onclick="updateService(<?php echo $value['id']; ?>)" data-toggle="modal" data-target="#modalService"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteService('<?= $value['id']; ?>')"><i class="fa fa-trash"></i></button>
                <form id="service-delete" style="display: none;" action="<?= BASEPATH; ?>admin/service/delete" method="post">
                  <input type="hidden" name="id_packet_list">
                </form>
              </td>
            </tr>
          <?php $idx++;
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="modalService" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEPATH; ?>admin/service/create" method="post">
          <div class="form-group">
            <label for="exampleFormControlInput1">Icon</label>
            <input type="text" name="icon" class="form-control" id="exampleFormControlInput1" placeholder="Salin nama icon disini..." required>
            <label><a href="https://fontawesome.com/search" target="_blank">Link Incon</a></label>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Judul</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
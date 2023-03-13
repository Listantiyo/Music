<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Service</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Split Button Primary</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            <td>No</td>
            <td>Icon</td>
            <td>Title</td>
            <td>Describe</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_service'] as $value) : ?>
            <tr>
              <td><?= $idx; ?></td>
              <td>
                <i class="fas fa-<?= $value['icon']; ?>"></i>
              </td>
              <td><?= $value['title']; ?></td>
              <td><?= $value['descrb']; ?></td>
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
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <input type="text" name="icon" class="form-control" id="exampleFormControlInput1" placeholder="Salin nama icon disini...">
            <label><a href="https://fontawesome.com/search" target="_blank">Link Incon</a></label>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Judul</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1">

          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Understood</button>
      </div>
      </form>
    </div>
  </div>
</div>
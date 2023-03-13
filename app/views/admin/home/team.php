<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Team</h1>
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
            <td>Image</td>
            <td>Name</td>
            <td>Title</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_team'] as $value) : ?>
            <tr>
              <td><?= $idx; ?></td>
              <td>
                <img src="<?= BASEPATH;
                          echo $value['path']; ?>" alt="" width="90px">
              </td>
              <td><?= $value['name']; ?></td>
              <td><?= $value['title']; ?></td>
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
        <form action="<?= BASEPATH; ?>admin/team/tambah" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="formName">Name</label>
            <input name="name" type="text" class="form-control" id="formName" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="formTitle">Title</label>
            <input name="title" type="text" class="form-control" id="formTitle" placeholder="Title">
          </div>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="inputProfile" aria-describedby="inputGroupFileAddon04">
              <label class="custom-file-label" for="inputProfile">Choose file</label>
            </div>
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
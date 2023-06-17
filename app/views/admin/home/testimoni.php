<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Testimoni</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a onclick="createTestimoni()" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalTestimoni">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Testimoni</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            <td>No</td>
            <td class="text-center">Name</td>
            <td style="width: 11rem;" class="text-center">Title</td>
            <td>Star</td>
            <td>Describe</td>
            <td style="width: 6rem;" class="text-center">Options</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_testimoni'] as $value) : ?>
            <tr>
              <td><?= $idx; ?></td>
              <td><?= $value['name']; ?></td>
              <td><?= $value['title']; ?></td>
              <td><?= $value['star']; ?></td>
              <td><?= $value['descrb']; ?></td>
              <td class="text-center">
                <button class="btn btn-sm btn-warning team-button update" onclick="updateTestimoni(<?php echo $value['id']; ?>)" data-toggle="modal" data-target="#modalTestimoni"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteTestimoni('<?= $value['id']; ?>')"><i class="fa fa-trash"></i></button>
                <form id="testimoni-delete" style="display: none;" action="<?= BASEPATH; ?>admin/testimoni/delete" method="post">
                  <input type="hidden" name="id_testimoni">
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
<div class="modal fade" id="modalTestimoni" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEPATH; ?>admin/testimoni/create" method="post">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Star</label>
            <select name="star" class="form-control">
              <option selected disabled hidden>Jumlah Bintang</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
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
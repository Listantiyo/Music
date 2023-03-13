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
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <td>Jonas Alexander</td>
            <td>Developer</td>
            <td>San Francisco</td>
            <td>30</td>
            <td>2010/07/14</td>
            <td>$86,500</td>
          </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
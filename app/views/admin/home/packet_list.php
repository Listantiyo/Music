<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Benefits</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <!-- Btn BITEM Create List Packet -->
    <a href="#" data-url="<?= BASEPATH; ?>" data-type="use" class="btn btn-primary btn-icon-split bitem" data-toggle="modal" data-target="#modalJenisPaket">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">List Packet</span>
    </a>

    <!-- Btn BITEM Cretate List Item -->
    <a href="" data-url="<?= BASEPATH; ?>" data-type="create" class="btn btn-primary btn-icon-split bitem" data-toggle="modal" data-target="#staticBackdrop">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text all-item">Item</span>
    </a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <td>No</td>
            <td>Title</td>
            <td>Packet</td>
            <td>Items</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_packet_list'] as $value) : ?>
            <tr>
              <td><?= $idx; ?></td>
              <td><?= $value['title']; ?></td>
              <td><?= $value['packet']; ?></td>
              <td>
                <ul>
                  <?php
                  $items;
                  $items = json_decode($value['items']);
                  $items = implode(',', $items);
                  $items = $this->model('Packet_List_Item_Model')->getPacketItems($items);
                  foreach ($items as $value) : ?>
                    <li><?= $value['name'] ?></li>
                  <?php endforeach; ?>
                </ul>
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

<!-- Modal 1 for create packet list-->
<div class="modal fade" id="modalJenisPaket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form create packet list -->
        <form action="<?= BASEPATH; ?>/admin/packet_list/create" method="post">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select name="category-packet" class="form-control category-pick" id="exampleFormControlSelect1">

              <!-- Space for option  -->

            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-check">
            <p>List - Item</p>
            <div class="checkbox-item-list">

              <!-- append space -->

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

<!-- Modal 2 for create items "OK"-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah List-Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body item">
        <!-- Form create Items Cheked -->
        <form class="conatiner-fluid" id="item-data" method="post" data-url="<?= BASEPATH; ?>" action="<?= BASEPATH; ?>/admin/packet_list_item/create" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="input-group mb-3 col-4">
              <div class="custom-file">
                <input name="file" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
            <div class="input-group mb-3 col-8">
              <input name="name" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tambah</button>
              </div>
            </div>
          </div>
        </form>
        <div class="container-fluid item-list d-flex">
          <!-- item list append -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
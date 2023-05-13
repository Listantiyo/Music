<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Benefits</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <!-- Btn BITEM Create List Packet -->
    <a href="#" data-type="use" class="btn btn-primary btn-icon-split bitem" data-toggle="modal" data-target="#modalJenisPaket">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">List Packet</span>
    </a>

    <!-- Btn BITEM Cretate List Item -->
    <a id="bitem-create" href="" data-type="create" class="btn btn-primary btn-icon-split bitem " data-toggle="modal" data-target="#itemModal">
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
            <td>Paket</td>
            <td>Nama</td>
            <td>Items</td>
            <td class="text-center">Options</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_packet_list'] as $value) : ?>
            <tr>
              <td><?= $idx; ?></td>
              <td><?= $value['packet']; ?></td>
              <td><?= $value['title']; ?></td>

              <td>
                <ul>
                  <?php
                  $items;
                  $items = json_decode($value['items']);
                  $items = implode(',', $items);
                  $items = $this->model('Packet_List_Item_Model')->getPacketItems($items);
                  foreach ($items as $values) : ?>
                    <li><?= $values['name'] ?></li>
                  <?php endforeach; ?>
                </ul>
              </td>

              <td class="text-center">
                <button class="btn btn-sm btn-warning" onclick="updateItemPacket(<?= $value['id']; ?>)" data-toggle="modal" data-target="#modalJenisPaket"><i class="fa fa-edit"></i></button>

                <button class="btn btn-sm btn-danger" onclick="$('#packet-delete').submit()"><i class="fa fa-trash"></i></button>
                <form id="packet-delete" style="display: none;" action="<?= BASEPATH; ?>admin/packet_list/delete" method="post">
                  <input type="hidden" name="id_packet_list" value="<?= $value['id']; ?>">
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
            <label for="exampleFormControlSelect1">Pilih Kategori</label>
            <select name="category-packet" class="form-control category-pick" id="exampleFormControlSelect1" >
            <option disabled selected hidden>Pilih</option>
              <!-- Space for option  -->

            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input name="title" type="text" class="form-control packet-list-title" id="exampleFormControlInput1" required>
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal 2 for create items "OK"-->
<div class="modal fade" id="itemModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModalLabel">Tambah List-Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body item">
        <!-- Form create Items Cheked -->
        <form class="conatiner-fluid " id="item-data" method="post" action="<?= BASEPATH; ?>/admin/packet_list_item/create" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="input-group mb-3 col-4">
              <div class="custom-file">
                <input name="file" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
              </div>
            </div>
            <div class="input-group mb-3 col-8">
              <input name="name" type="text" class="form-control" placeholder="Nama item" aria-label="Recipient's username" aria-describedby="button-addon2">
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

<!-- Modal 3 for update items "OK"-->
<div class="modal fade" id="itemModalUP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModalUPLabel">Modal title</h5>
        <button type="button" onclick="$('.bitem[data-type=create]').trigger('click')" class="close" data-dismiss="modal" aria-label="Close ">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="conatiner-fluid" class="" id="item-dataUP" method="post" action="<?= BASEPATH; ?>/admin/packet_list_item/update" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id">
          <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="input-group">
            <img class="mr-2 preview" height="90px" width="135" style="object-fit: contain;" src="https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg" id="show" alt="alternative" srcset="">
            <div class="custom-file">
              <input type="hidden" class="form-control" name="old_itemPath" value="">
              <input type="hidden" class="form-control" name="old_itemImage" value="">
              <input type="file" name="file" onchange="preview(this)" class="custom-file-input" id="inputProfile">
              <label class="custom-file-label" for="inputProfile">Pilih Gambar ...</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="$('.bitem[data-type=create]').trigger('click')" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- onclick="itemsForm($(this).parents('form'))" -->
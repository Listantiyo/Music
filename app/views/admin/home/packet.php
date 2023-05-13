<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Packet</h1>
<div class="card-header py-3"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a onclick="packetCreate()" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Paket</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td style="width: 1rem;">No</td>
                        <td style="width: 6rem;" class="text-center">Gambar</td>
                        <td style="width: 11rem;" class="text-center">Judul</td>
                        <td class="text-center">Deskripsi</td>
                        <td style="width: 6rem;" class="text-center">Opsi</td>

                    </tr>
                </thead>
                <tbody>
                    <?php $idx = 1;
                    foreach ($data['old_packet'] as $value) : ?>
                        <tr>
                            <td><?= $idx; ?></td>
                            <td>
                                <img src="<?= BASEPATH;
                                            echo $value['path']; ?>" alt="" width="100rem">
                            </td>
                            <td><?= $value['title']; ?></td>
                            <td><?= $value['descrb']; ?></td>
                            <td class="text-center">

                                <button class="btn btn-sm btn-warning" onclick="packetUpdate($(this).data('id'))" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $value['id'] ?>"><i class="fa fa-edit"></i></button>

                                <button class="btn btn-sm btn-danger" onclick="packetDelete('<?= $value['id']; ?>','<?= $value['path']; ?>')"><i class="fa fa-trash"></i></button>
                                <form id="packet-delete" style="display: none;" action="<?= BASEPATH; ?>admin/packet/delete" method="post">
                                    <input type="hidden" name="id_packet">
                                    <input type="hidden" name="path">
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

</div> <!-- /.container-fluid -->
</div> <!-- End of Main Content -->

<!-- Modal Create Packet (admin/packet/create)-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-packet" action="<?= BASEPATH; ?>admin/packet/create" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>
                    </div>
                    <div class="input-group">
                        <img class="mr-2 preview" height="90px" width="135" style="object-fit: contain;" src="https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg" id="show" alt="alternative" srcset="">
                        <div class="custom-file">

                            <input type="file" name="file" onchange="preview(this)" class="custom-file-input" id="inputProfile">
                            <label class="custom-file-label" for="inputProfile">Pilih Gambar ...</label>
                        </div>
                    </div>
                    <div class="input-group">

                    </div>
                    <div class="form-group pt-2">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="descrb" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
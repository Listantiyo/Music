<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Packet</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
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
                        <td>No</td>
                        <td>Image</td>
                        <td>Title</td>
                        <td>Describe</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $idx = 1;
                    foreach ($data['old_packet'] as $value) : ?>
                        <tr>
                            <td><?= $idx; ?></td>
                            <td>
                                <img src="<?= BASEPATH;
                                            echo $value['path']; ?>" alt="" width="90px">
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

<!-- Modal Create Packet (admin/packet/create)-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASEPATH; ?>admin/packet/create" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="hidden" name="old_image" value="old_image">
                            <input type="file" name="file" class="custom-file-input" id="inputProfile">
                            <label class="custom-file-label" for="inputProfile">Choose Image ...</label>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="descrb" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="sumbit" class="btn btn-primary">Understood</button>
                </div>
            </form>
        </div>
    </div>
</div>
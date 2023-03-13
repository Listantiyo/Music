<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">About</h1>
<!-- <div class="card-header py-3"></div> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="<?= BASEPATH; ?>admin/about/update" method="post" enctype="multipart/form-data">
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50"> <i class="fas fa-plus"></i> </span>
                <span class="text"> Update</span>
            </button>
    </div>
    <div class="card-body row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="<?= $data['old_about']['title'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Text 1</label>
                <input name="text-1" type="text" class="form-control" id="exampleFormControlInput1" value=" <?= $data['old_about']['text1'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Text 2</label>
                <input name="text-2" type="text" class="form-control" id="exampleFormControlInput1" value=" <?= $data['old_about']['text2'] ?>">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <label class="" for="inputGroupFile01">Image</label>
            <div class="row">
                <div class="input-group mb-3 col-8">
                    <div class="custom-file">
                        <input type="hidden" name="old_image" value="<?= $data['old_about']['img'] ?>">
                        <input type=" hidden" name="old_path" value="<?= $data['old_about']['path'] ?>">
                        <input name=" file" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <img class="col-4" src="<?= BASEPATH, $data['old_about']['path']; ?>" width="100rem" alt="" srcset="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Paragraph</label>
                <textarea name="paragraph" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $data['old_about']['paragraph'] ?></textarea>
            </div>
        </div>
        </form>

    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
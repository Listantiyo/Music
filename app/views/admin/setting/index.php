<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">About</h1>
<!-- <div class="card-header py-3"></div> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form action="<?= BASEPATH; ?>admin/setting/update" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            <div class="col">
                <label for="basic-url">Main</label>

                <div class="row">
                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Brand</span>
                        </div>
                        <input type="text" name="brand" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="old_logo" value="">
                            <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>

                <label for="basic-url">Contact</label>
                <div class="row">

                    <div class="input-group mb-3 col-6">
                        <input type="email" name="email" class="form-control" placeholder="example@mail.ex" aria-label="example@mail.ex" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Email</span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-6">
                        <input type="number" name="phone" class="form-control" placeholder="08xxxxxxxxxx" aria-label="08xxxxxxxxxx" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Phone</span>
                        </div>
                    </div>
                </div>
                <label for="basic-url">Addres</label>

                <div class="input-group mb-3">
                    <textarea name="addres" class="form-control" aria-label="With textarea"></textarea>
                </div>

                <label for="basic-url">Social Media</label>
                <div class="row">
                    <div class="input-group mb-3 col-6">
                        <input type="text" name="twitter" class="form-control" placeholder="twitter-url" aria-label="twitter-url" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Twitter</span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-6">
                        <input type="text" name="facebook" class="form-control" placeholder="facebook-url" aria-label="facebook-url" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Facebook</span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-6">
                        <input type="text" name="instagram" class="form-control" placeholder="instagram-url" aria-label="instagram-url" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Instagram</span>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-6">
                        <input type="text" name="linkedin" class="form-control" placeholder="linkedin-url" aria-label="linkedin-url" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Linkedin</span>
                        </div>
                    </div>
                </div>

                <label for="basic-url">Slideshow</label>
                <div class="row">
                    <div class="input-group mb-3 col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Slide 1</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="old_slide-1">
                            <input type="file" name="slide-1" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Slide 2</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="old_slide-2">
                            <input type="file" name="slide-2" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3 col-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Slide 3</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="old_slide-3">
                            <input type="file" name="slide-3" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                <label for="basic-url">Layouts</label>
                <div class="row">

                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text">`Packet textarea</span>
                        </div>
                        <textarea name="packet-desc" class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Service textarea</span>
                        </div>
                        <textarea name="service-desc" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50"> <i class="fas fa-leaf"></i> </span>
                    <span class="text"> Update</span>
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
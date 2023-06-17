<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">About</h1>
<!-- <div class="card-header py-3"></div> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <form action="<?= BASEPATH; ?>admin/setting/update" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            <div class="col">



                <div class="setting-layout">
                    <label for="basic-url"><b>Main</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group col-12 pl-0  mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Brand</span>
                                </div>
                                <input type="text" name="brand" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" value="<?php if (isset($data['old_setting']['brand'])) echo $data['old_setting']['brand']; ?>">
                            </div>

                            <div class="input-group col-12 pl-0 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                                </div>
                                <div class="custom-file">
                                    <input type="hidden" name="old_logo" value="<?php if (isset($data['old_setting']['logo'])) echo $data['old_setting']['logo']; ?>">
                                    <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 col-6 d-flex justify-content-center">
                            <?php if (isset($data['old_setting']['logo'])) { ?>
                                <img width="100rem" height="100rem" src="<?= BASEPATH;
                                                                            echo $data['old_setting']['logo']; ?>" alt="">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="basic-url">Contact</label>
                            <div class="row">

                                <div class="input-group mb-3 col-12">
                                    <input type="email" name="email" class="form-control" placeholder="example@mail.ex" aria-label="example@mail.ex" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['email'])) echo $data['old_setting']['email']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Email</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3 col-12">
                                    <input type="number" name="phone" class="form-control" placeholder="08xxxxxxxxxx" aria-label="08xxxxxxxxxx" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['phone'])) echo $data['old_setting']['phone']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Phone</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <label for="basic-url">Addres</label>
                            <div class="input-group mb-3">
                                <textarea name="addres" class="form-control" aria-label="With textarea" rows="3"><?php if (isset($data['old_setting']['addres'])) echo $data['old_setting']['addres']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="setting-layout">
                    <label for="basic-url">Social Media</label>
                    <div class="row">
                        <div class="input-group mb-3 col-6">
                            <input type="text" name="twitter" class="form-control" placeholder="twitter-url" aria-label="twitter-url" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['twitter'])) echo $data['old_setting']['twitter']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Twitter</span>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-6">
                            <input type="text" name="facebook" class="form-control" placeholder="facebook-url" aria-label="facebook-url" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['facebook'])) echo $data['old_setting']['facebook']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Facebook</span>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-6">
                            <input type="text" name="instagram" class="form-control" placeholder="instagram-url" aria-label="instagram-url" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['instagram'])) echo $data['old_setting']['instagram']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Instagram</span>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-6">
                            <input type="text" name="linkedin" class="form-control" placeholder="linkedin-url" aria-label="linkedin-url" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['linkedin'])) echo $data['old_setting']['linkedin']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Linkedin</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="setting-layout">
                    <div class="row">
                        <div class="col-6">
                            <label for="basic-url">Slidehow Text</label>
                            <div class="row">
                                <div class="input-group mb-3 col-12">
                                    <input type="text" name="slide_title" class="form-control" placeholder="slide-title" aria-label="" aria-describedby="basic-addon2" value="<?php if (isset($data['old_setting']['slide_title'])) echo $data['old_setting']['slide_title']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Title</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3 col-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Slide Description</span>
                                    </div>
                                    <textarea name="slide_desc" class="form-control" aria-label="With textarea"><?php if (isset($data['old_setting']['slide_desc'])) echo $data['old_setting']['slide_desc']; ?></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <label for="basic-url">Testimoni</label>
                            <div class="row">

                                <div class="input-group mb-3 col-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Testimoni Description</span>
                                    </div>
                                    <textarea name="testimoni_desc" class="form-control" aria-label="With textarea" rows="4"><?php if (isset($data['old_setting']['testimoni_desc'])) echo $data['old_setting']['testimoni_desc']; ?></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <label for="basic-url">Slideshow Image</label>
                    <div class="row">
                        <div class="input-group mb-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Image 1</span>
                            </div>
                            <div class="custom-file">
                                <input type="hidden" name="old_slide-1" value="<?php if (isset($data['old_setting']['slide_1'])) echo $data['old_setting']['slide_1']; ?>">
                                <input type="file" name="slide-1" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Image 2</span>
                            </div>
                            <div class="custom-file">
                                <input type="hidden" name="old_slide-2" value="<?php if (isset($data['old_setting']['slide_2'])) echo $data['old_setting']['slide_2']; ?>">
                                <input type="file" name="slide-2" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Image 3</span>
                            </div>
                            <div class="custom-file">
                                <input type="hidden" name="old_slide-3" value="<?php if (isset($data['old_setting']['slide_3'])) echo $data['old_setting']['slide_3']; ?>">
                                <input type="file" name="slide-3" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"><img width="100rem" src="<?= BASEPATH;
                                                                    echo $data['old_setting']['slide_1']; ?>" alt=""></div>
                        <div class="col-4"><img width="100rem" src="<?= BASEPATH;
                                                                    echo $data['old_setting']['slide_2']; ?>" alt=""></div>
                        <div class="col-4"><img width="100rem" src="<?= BASEPATH;
                                                                    echo $data['old_setting']['slide_3']; ?>" alt=""></div>
                    </div>
                </div>
                <hr>

                <div class="setting-layout">
                    <label for="basic-url">Layouts</label>
                    <div class="row">

                        <div class="input-group mb-3 col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Packet Description</span>
                            </div>
                            <textarea name="packet-desc" class="form-control" aria-label="With textarea"><?php if (isset($data['old_setting']['packet_desc'])) echo $data['old_setting']['packet_desc']; ?></textarea>
                        </div>

                        <div class="input-group mb-3 col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Service Description</span>
                            </div>
                            <textarea name="service-desc" class="form-control" aria-label="With textarea"><?php if (isset($data['old_setting']['service_desc'])) echo $data['old_setting']['service_desc']; ?></textarea>
                        </div>
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
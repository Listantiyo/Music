<?php Flasher::flash(); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Team</h1>
<div class="card-header py-3">

</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <a onclick="createTeam()" class="btn btn-primary btn-icon-split team-button add" data-toggle="modal" data-target="#TeamModal">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Team</span>
    </a>


  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <td class="text-center" width="1.5rem">No</td>
            <td width="138rem">Photo (1:1 = ▨)</td>
            <td>Nama</td>
            <td>Title</td>
            <td class="text-center" width="2rem">Sosmed</td>
            <td class="text-center" width="100rem">Option</td>
          </tr>
        </thead>
        <tbody>
          <?php $idx = 1;
          foreach ($data['old_team'] as $value) : ?>
            <tr>
              <td class="text-center"><?= $idx; ?></td>
              <td class="text-center">
                <img src="<?= BASEPATH;
                          echo $value['path']; ?>" alt="" width="90px">
              </td>
              <td><?= $value['name']; ?></td>
              <td><?= $value['title']; ?></td>

              <td class="text-center">
                <!-- Link Button -->
                <button onclick="teamLinkUpdate(<?= $value['id'] ?>)" class="btn btn-sm btn-info team-link-button" data-url="<?= BASEPATH; ?>" data-toggle="modal" data-target="#staticBackdropLink" data-id="<?= $value['id'] ?>"><i class="fa fa-link"></i></button><br>
                <hr>

                <?php if ($value['twitter'] != null) echo '<i class="bi bi-twitter"></i>'; ?>
                <?php if ($value['facebook'] != null) echo '<i class="bi bi-facebook"></i><br>'; ?>
                <?php if ($value['instagram'] != null) echo '<i class="bi bi-instagram"></i>'; ?>
                <?php if ($value['linkedin'] != null) echo '<i class="bi bi-linkedin"></i>'; ?>
              </td>


              <td class="text-center">
                <!-- Update Button -->
                <button class="btn btn-sm btn-warning team-button update" data-toggle="modal" data-target="#TeamModal" onclick="updateTeam(<?= $value['id'] ?>)"><i class="fa fa-edit"></i></button>

                <!-- Delete Button -->
                <button onclick="$('.form-delete').submit();" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                <form class="form-delete" action="<?= BASEPATH; ?>admin/team/delete" method="post">
                  <input type="hidden" value="<?= $value['id'] ?>" name="id">
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


<!-- Modal Tambah Team-->
<div class="modal fade" id="TeamModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="TeamModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TeamModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="FormModalTeam" action="<?= BASEPATH; ?>admin/team/create" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="formName">Name</label>
            <input name="id" type="hidden" class="form-control team-input">
            <input name="name" type="text" class="form-control team-input" id="formName" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="formTitle">Title</label>
            <input name="title" type="text" class="form-control team-input" id="formTitle" placeholder="Title">
          </div>
          <div class="input-group">
            <img class="mr-2 preview" height="90px" width="135" style="object-fit: contain;" src="https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg" id="show" srcset="">
            <div class="custom-file">
              <input name="old_image" type="hidden" class="form-control team-input">
              <input name="old_path" type="hidden" class="form-control team-input">
              <input type="file" onchange="preview(this)" name=" file" class="team-input custom-file-input" id="inputProfile" aria-describedby="inputGroupFileAddon04">
              <label class="custom-file-label" for="inputProfile">Choose file</label>
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

<!-- Modal Link-->
<div class="modal fade team-link" id="staticBackdropLink" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLinkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLinkLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="team-link" action="<?= BASEPATH; ?>admin/team/updateLink" method="post">
          <div>
            <label class="sr-only" for="inlineFormInputGroup">Twitter</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-twitter"></i></div>
              </div>
              <input class="team-link-input" type="hidden" name="id_team">
              <input title="Example : https://www.linkedin.com/in/user-name-b84090252/" type="text" name="twitter" class="form-control team-link-input" id="inlineFormInputGroup" placeholder="Twitter">
            </div>
          </div>
          <div>
            <label class="sr-only" for="inlineFormInputGroup">Facebook</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-facebook"></i></div>
              </div>
              <input title="Example : https://www.facebook.com/user-name.xxx/" type="text" name="facebook" class="form-control team-link-input" id="inlineFormInputGroup" placeholder="Facebook">
            </div>
          </div>
          <div>
            <label class="sr-only" for="inlineFormInputGroup">Instagram</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-instagram"></i></div>
              </div>
              <input title="https://www.instagram.com/username/" type="text" name="instagram" class="form-control team-link-input" id="inlineFormInputGroup" placeholder="Instagram">
            </div>
          </div>
          <div>
            <label class="sr-only" for="inlineFormInputGroup">Linkedin</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-linkedin"></i></div>
              </div>
              <input title="https://www.linkedin.com/in/username/" type="text" name="linkedin" class="form-control team-link-input" id="inlineFormInputGroup" placeholder="Linkedin">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-sync  mr-1 "></i><b> Perbarui</b></button>
      </div>
      </form>
    </div>
  </div>
</div>
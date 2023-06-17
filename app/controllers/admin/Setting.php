<?php

class Setting extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['token'])) {
            header('Location: ' . BASEPATH . 'token');
        }
        $data['old_setting'] = $this->model('Setting_Model')->getSingle();

        $this->view('admin/master/header');
        $this->view('admin/setting/index', $data);
        $this->view('admin/master/footer');
    }

    public function update()
    {

        //? validate
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);

        if (!$is_valid) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }

        $upload = new Upload;

        $is['file'] = $_FILES['logo'];
        $data['image']['logo']  = $upload->image($is);

        if (gettype($data['image']['logo']) == 'string') {
            Flasher::setFlash('GAGAL', $data['image']['logo'], 'warning', 'UPLOAD LOGO');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }
        $upload->imageUpdate($data['image']['logo']['error'], $_POST['old_logo']);


        $is['file'] = $_FILES['slide-1'];
        $data['image']['slide_1'] = $upload->image($is, 5);

        if (gettype($data['image']['slide-1']) == 'string') {
            Flasher::setFlash('GAGAL', $data['image']['slide-1'], 'warning', 'UPLOAD SLIDE-1');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }
        $upload->imageUpdate($data['image']['slide_1']['error'], $_POST['old_slide-1']);


        $is['file'] = $_FILES['slide-2'];
        $data['image']['slide_2'] = $upload->image($is, 5);

        if (gettype($data['image']['slide-2']) == 'string') {
            Flasher::setFlash('GAGAL', $data['image']['slide-2'], 'warning', 'UPLOAD SLIDE-2');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }
        $upload->imageUpdate($data['image']['slide_2']['error'], $_POST['old_slide-2']);


        $is['file'] = $_FILES['slide-3'];
        $data['image']['slide_3'] = $upload->image($is, 5);

        if (gettype($data['image']['slide-3']) == 'string') {
            Flasher::setFlash('GAGAL', $data['image']['slide-3'], 'warning', 'UPLOAD SLIDE-3');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }
        $upload->imageUpdate($data['image']['slide_3']['error'], $_POST['old_slide-3']);


        $data['input'] = $_POST;

        if ($this->model('Setting_Model')->update($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }
    }
}

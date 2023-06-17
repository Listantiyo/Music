<?php

class About extends Controller
{
    public function index()
    {
        $data['old_about'] = $this->model('About_Model')->getSingle();

        $this->view('admin/master/header');
        $this->view('admin/home/about', $data);
        $this->view('admin/master/footer');
    }

    public function update()
    {
        //? validate
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);

        if (!$is_valid) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/about');
            exit;
        }


        $upload = new Upload;
        $data['image'] = $upload->image($_FILES, 5, 'about');
        $data['input'] = $_POST;

        if (gettype($data['image']) == 'string') {
            Flasher::setFlash('GAGAL', $data['image'], 'warning', 'UPLOAD');
            header('Location: ' . BASEPATH . 'admin/about');
            exit;
        }

        if (file_exists($data['input']['old_path'])) {
            if ($data['image']['error'] === 0 && !is_null($data['input']['old_image'])) {
                unlink($data['input']['old_path']);
            }
        }

        if ($this->model('About_Model')->update($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/about');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/about');
            exit;
        }
    }
}

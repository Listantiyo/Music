<?php

class Gallery extends Controller
{

    public function index()
    {
        $data['get_gallery'] = $this->model('Gallery_Model')->getAll();

        $this->view('admin/master/header');
        $this->view('admin/home/gallery', $data);
        $this->view('admin/master/footer');
    }

    public function tambah()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES, 5, 'gallery');

        if (gettype($image) == 'string') {
            Flasher::setFlash('GAGAL', $image, 'warning', 'UPLOAD');
            header('Location: ' . BASEPATH . 'admin/gallery');
            exit;
        }

        if (($this->model('Gallery_model')->tambah($image)) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEPATH . 'admin/gallery');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEPATH . 'admin/gallery');
            exit;
        }
    }

    public function delete()
    {
        $id = $_POST['id_image'];
        $upload = new Upload;
        $upload->imageDelete($_POST['path']);

        if ($this->model('Gallery_Model')->delete($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEPATH . 'admin/gallery');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEPATH . 'admin/gallery');
            exit;
        }
    }
}

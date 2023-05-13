<?php

class Packet extends Controller
{

    public function index()
    {
        $data['old_packet'] = $this->model('Packet_Model')->getAll();

        $this->view('admin/master/header');
        $this->view('admin/home/packet', $data);
        $this->view('admin/master/footer');
    }

    public function getSingle()
    {
        $id = $_POST['id'];

        $data = $this->model('Packet_Model')->getSingle($id);
        echo json_encode($data);
    }

    public function create()
    {

        //? validate
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);
        if (!$is_valid) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
        //* fillter image
        $upload = new Upload;
        $image = $upload->image($_FILES, 5);
        if (gettype($image) == 'string') {
            Flasher::setFlash('GAGAL', $image, 'warning', 'UPLOAD');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
        // end fillter
        $data['input'] = $_POST;
        $data['image'] = $image;

        if ($this->model('Packet_Model')->create($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
    }

    public function update()
    {
        //? validate
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);
        if (!$is_valid) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
        //* fillter image
        $upload = new Upload;
        $image = $upload->image($_FILES);
        if (gettype($image) == 'string') {
            Flasher::setFlash('GAGAL', $image, 'warning', 'UPLOAD');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }

        $data['input'] = $_POST;
        $data['image'] = $image;
        //! delete old image 
        $upload->imageUpdate($data['image']['error'], $data['input']['old_path']);

        if ($this->model('Packet_Model')->update($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
    }

    public function delete()
    {
        $id = $_POST['id_packet'];

        $upload = new Upload;
        $upload->imageDelete($_POST['path']);

        if ($this->model('Packet_Model')->delete($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
    }
}

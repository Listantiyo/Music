<?php

class Service extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['token'])) {
            header('Location: ' . BASEPATH . 'token');
        }

        $data['old_service'] = $this->model('Service_Model')->getAll();

        $this->view('admin/master/header');
        $this->view('admin/home/service', $data);
        $this->view('admin/master/footer');
    }

    public function getSingle()
    {
        $data = $this->model('Service_Model')->getSingle($_POST['id']);
        echo json_encode($data);
    }

    public function create()
    {
        //? validate
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);
        if (!$is_valid) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        }

        if ($this->model('Service_Model')->create($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEPATH . 'admin/service');
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
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        }

        if ($this->model('Service_Model')->update($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        }
    }

    public function delete()
    {
        $id = $_POST['id_packet_list'];

        if ($this->model('Service_Model')->delete($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        }
    }
}

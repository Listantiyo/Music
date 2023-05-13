<?php

class Packet_List extends Controller
{

    public function index()
    {

        $query = "SELECT pl.* ,p.title AS packet FROM tbl_packet_list AS pl LEFT JOIN tbl_packet AS p ON p.id = pl.category_id ORDER BY packet";

        $data['old_packet_list'] = $this->model('Packet_List_Model')->getAll($query);

        $this->view('admin/master/header');
        $this->view('admin/home/packet_list', $data);
        $this->view('admin/master/footer');
    }


    public function getSingle()
    {

        $query = "SELECT p.*,pl.category_id FROM `tbl_packet` as p LEFT JOIN tbl_packet_list as pl ON p.id = pl.category_id;";
        $data['packet_item'] = $this->model('Packet_List_Model')->getSingle($_POST['id']);
        $data['category'] = $this->model('Packet_Model')->getAll($query);
        $data['items'] = $this->model('Packet_List_Item_Model')->getAll();

        echo json_encode($data);
    }

    public function getAll()
    {
        $data = $this->model('Packet_List_Item_Model')->getAll();
        echo json_encode($data);
    }

    public function create()
    {

        if (!isset($_POST['category-packet']) || !isset($_POST['item'])) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        }
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);
        if (!$is_valid) {
           Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit; 
        }
        $data['input'] = $_POST;

        if ($this->model('Packet_List_Model')->create($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        }
    }

    public function update()
    {
        if (!isset($_POST['category-packet']) || !isset($_POST['item'])) {
            Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        }
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);
        if (!$is_valid) {
           Flasher::setFlash('tidak', 'lengkap', 'warning');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit; 
        }
        $data['input'] = $_POST;

        if ($this->model('Packet_List_Model')->update($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        }
    }

    public function delete()
    {
        $id = $_POST['id_packet_list'];

        if ($this->model('Packet_List_Model')->delete($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        }
    }
}

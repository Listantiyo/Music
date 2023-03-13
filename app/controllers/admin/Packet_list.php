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

    public function getAll()
    {

        $data = $this->model('Packet_List_Item_Model')->getAll();
        if (true) {

            echo json_encode($data);
        }
    }

    public function create()
    {

        $data['input'] = $_POST;

        if ($this->model('Packet_List_Model')->create($data) > 0) {
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/packet_list');
            exit;
        }
    }
}

<?php

class Home extends Controller
{

    public function index()
    {
        $query['packet'] = "SELECT p.*, COUNT(pl.category_id) as count_used FROM tbl_packet as p LEFT JOIN tbl_packet_list as pl ON p.id = pl.category_id GROUP BY p.id";

        $data['get_packet'] = $this->model('Packet_model')->getAll($query['packet']);

        $this->view('user/master/header');
        $this->view('user/home/index', $data);
        $this->view('user/master/footer');
    }

    public function getPacketList()
    {

        $query = "SELECT pl.* ,p.title AS packet FROM tbl_packet_list AS pl LEFT JOIN tbl_packet AS p ON p.id = pl.category_id  WHERE pl.category_id = " . $_POST['id_pkg'];

        $data['packet_list'] = $this->model('Packet_List_Model')->getAll($query);
        echo json_encode($data);
    }

    public function getPacketListItems()
    {
        $items = json_decode($_POST['ids']);
        $items = implode(',', $items);
        $data['item_list'] = $this->model('Packet_List_Item_Model')->getPacketItems($items);
        echo json_encode($data);
    }
}

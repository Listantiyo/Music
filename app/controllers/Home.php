<?php

class Home extends Controller
{

    public function index()
    {
        $data['location'] = 'Home';
        $query['packet'] = "SELECT p.*, COUNT(pl.category_id) as count_used FROM tbl_packet as p LEFT JOIN tbl_packet_list as pl ON p.id = pl.category_id GROUP BY p.id";
        $data['get_packet'] = $this->model('Packet_model')->getAll($query['packet']);
        $data['get_service'] = $this->model('Service_model')->getAll();

        $data['packet'] = $this->model('Packet_List_Model')->getAll('SELECT COUNT(*) as count FROM `tbl_packet_list`')[0]['count'];
        $data['service'] = $this->model('Service_model')->getAll('SELECT COUNT(*) as count FROM `tbl_service`')[0]['count'];
        $data['team'] = $this->model('Team_model')->getAll('SELECT COUNT(*) as count FROM `tbl_team`')[0]['count'];
        $data['gallery'] = $this->model('Gallery_model')->getAll('SELECT COUNT(*) as count FROM `tbl_gallery`')[0]['count'];

        $this->view('user/master/header', $data);
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

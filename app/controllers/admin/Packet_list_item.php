<?php

class Packet_List_Item extends Controller
{

    public function index()
    {
        $this->view('admin/master/header');
        $this->view('admin/home/packet_list');
        $this->view('admin/master/footer');
    }

    public function getAll()
    {

        // get list packet
        if (isset($_POST)) {
            if ($_POST['type'] === 'use') {
                $data['category'] = $this->model('Packet_Model')->getAll();
            }
        }
        // get list items
        $data['items'] = $this->model('Packet_List_Item_Model')->getAll();
        if (true) {
            // return list item || list items + list packet
            echo json_encode($data);
        }
    }

    public function create()
    {
        $upload = new Upload;
        $data['image'] = $upload->image($_FILES);
        $data['input'] = $_POST;

        if ($this->model('Packet_List_Item_Model')->create($data) > 0) {

            $data = $this->model('Packet_List_Item_Model')->getAll();
            echo json_encode($data);
        }
    }
}

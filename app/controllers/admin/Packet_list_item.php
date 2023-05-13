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
        // return list item || list items + list packet
        echo json_encode($data);
    }

    public function getSingle()
    {
        $data['item'] = $this->model('Packet_List_Item_Model')->getSingle($_POST['id']);
        echo json_encode($data);
    }

    public function create()
    {
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);
        if (!$is_valid) {
            $data_out['status'] = 'BELUM LENGKAP';
            $data_out['items'] = $this->model('Packet_List_Item_Model')->getAll();
            echo json_encode($data_out);
            exit;
        }
        $upload = new Upload;
        $data['image'] = $upload->image($_FILES,2);
        $data['input'] = $_POST;

        if (gettype($data['image']) == 'string') {
            $data_out['status'] = $data['image'];
            $data_out['items'] = $this->model('Packet_List_Item_Model')->getAll();
            echo json_encode($data_out);
            exit;
        }

        if ($this->model('Packet_List_Item_Model')->create($data) > 0) {

            $data_out['items'] = $this->model('Packet_List_Item_Model')->getAll();
            echo json_encode($data_out);
        }
    }

    public function update()
    {
        $validate  = new Validate;
        $is_valid  = $validate->form($_POST);

        if (!$is_valid) {
            $data_out['status'] = 'BELUM LENGKAP';
            $data_out['items'] = $this->model('Packet_List_Item_Model')->getAll();
            $data_out['update'] = true;
            echo json_encode($data_out);
            exit;
        }

        $upload = new Upload;

        $data['image'] = $upload->image($_FILES,0.1);
        $data['input'] = $_POST;

        if (gettype($data['image']) == 'string') {
            $data_out['status'] = $data['image'];
            $data_out['items'] = $this->model('Packet_List_Item_Model')->getAll();
            $data_out['update'] = true;
            echo json_encode($data_out);
            exit;
        }

        if ($this->model('Packet_List_Item_Model')->update($data) > 0) {
            $data_out['items'] = $this->model('Packet_List_Item_Model')->getAll();
            $data_out['update'] = true;
            echo json_encode($data_out);
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        $path = $this->model('Packet_List_Item_Model')->getSingle($id);
        $upload = new Upload;
        $upload->imageDelete($path['path']);

        if ($this->model('Packet_List_Item_Model')->delete($id) > 0) {

            $data['items'] = $this->model('Packet_List_Item_Model')->getAll();
            echo json_encode($data);
        }
    }
}

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

    public function create()
    {

        // fillter image
        $upload = new Upload;
        $image = $upload->image($_FILES);
        // end fillter
        $data['input'] = $_POST;
        $data['image'] = $image;

        if ($this->model('Packet_Model')->create($data) > 0) {
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Packet_Model')->update($_POST) > 0) {
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/packet');
            exit;
        }
    }
}

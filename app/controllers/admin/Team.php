<?php

class Team extends Controller
{

    public function index()
    {
        $data['old_team'] = $this->model('Team_Model')->getAll();

        $this->view('admin/master/header');
        $this->view('admin/home/team', $data);
        $this->view('admin/master/footer');
    }

    public function tambah()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES);
        $data['input'] = $_POST;
        $data['image'] = $image;
        if (($this->model('Team_model')->tambah($data)) > 0) {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        }
    }
}

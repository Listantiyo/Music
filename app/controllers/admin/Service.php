<?php

class Service extends Controller
{

    public function index()
    {

        $data['old_service'] = $this->model('Service_Model')->getAll();

        $this->view('admin/master/header');
        $this->view('admin/home/service', $data);
        $this->view('admin/master/footer');
    }

    public function create()
    {

        if ($this->model('Service_Model')->create($_POST) > 0) {
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Service_Model')->update($_POST) > 0) {
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/service');
            exit;
        }
    }
}

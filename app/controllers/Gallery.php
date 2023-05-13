<?php

class Gallery extends Controller
{

    public function index()
    {
        $data['location'] = 'Gallery';
        $data['get_images'] = $this->model('Gallery_Model')->getAll();
        $this->view('user/master/header', $data);
        $this->view('user/gallery/index', $data);
        $this->view('user/master/footer');
    }

    public function getGallery()
    {
        $query = 'SELECT * FROM :table LIMIT ';
        $data['get_images'] = $this->model('Gallery_Model')->getAll($query);
        var_dump($data);
    }
}

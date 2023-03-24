<?php

class Gallery extends Controller
{

    public function index()
    {

        $this->view('user/master/header');
        $this->view('user/gallery/index');
        $this->view('user/master/footer');
    }

    public function getGallery()
    {
        $query = 'SELECT * FROM :table LIMIT ';
        $data['get_images'] = $this->model('Gallery_Model')->getAll($query);
    }
}

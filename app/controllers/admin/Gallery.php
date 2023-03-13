<?php

class Gallery extends Controller {

    public function index()
    {
        $this->view('admin/master/header');
        $this->view('admin/home/gallery');
        $this->view('admin/master/footer');
    }

    public function tambah()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES);
        if (($this->model('Gallery_model')->tambah($image)) > 0) {
            header('Location: '.BASEPATH.'admin/gallery');
            exit;
        }else{
            header('Location: '.BASEPATH.'admin/gallery');
            exit;
        }
    }
    
}
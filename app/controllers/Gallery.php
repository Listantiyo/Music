<?php

class Gallery extends Controller{

    public function index()
    {
        $this->view('user/master/header');
        $this->view('user/gallery/index');
        $this->view('user/master/footer');
    }

}

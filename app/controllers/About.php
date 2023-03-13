<?php

class About extends Controller{

    public function index()
    {
        $this->view('user/master/header');
        $this->view('user/about/index');
        $this->view('user/master/footer');
    }
}
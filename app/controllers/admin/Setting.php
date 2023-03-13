<?php

class Setting extends Controller {

    public function index()
    {
        $this->view('admin/master/header');
        $this->view('admin/home/setting');
        $this->view('admin/master/footer');
    }
    
}
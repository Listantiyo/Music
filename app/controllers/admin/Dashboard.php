<?php

class Dashboard extends Controller {

    public function index()
    {
        $this->view('admin/master/header');
        $this->view('admin/dashboard/index');
        $this->view('admin/master/footer');
    }
    
}
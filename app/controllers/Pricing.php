<?php

class Pricing extends Controller{

    public function index()
    {
        $this->view('user/master/header');
        $this->view('user/pricing/index');
        $this->view('user/master/footer');
    }
}
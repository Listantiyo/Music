<?php

class Contact extends Controller{

    public function index()
    {
        $this->view('user/master/header');
        $this->view('user/contact/index');
        $this->view('user/master/footer');
    }
}
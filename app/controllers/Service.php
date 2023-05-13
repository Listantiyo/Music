<?php

class Service extends Controller
{

    public function index()
    {
        $data['location'] = 'Service';
        $this->view('user/master/header');
        $this->view('user/service/index');
        $this->view('user/master/footer');
    }
}

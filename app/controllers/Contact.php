<?php

class Contact extends Controller
{

    public function index()
    {
        $data['location'] = 'Contact';
        $this->view('user/master/header', $data);
        $this->view('user/contact/index', $data);
        $this->view('user/master/footer');
    }
}

<?php

class Dashboard extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['token'])) {
            header('Location: ' . BASEPATH . 'token');
        }
        $this->view('admin/master/header');
        $this->view('admin/dashboard/index');
        $this->view('admin/master/footer');
    }
}

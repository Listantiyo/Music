<?php

class About extends Controller
{
    public function index()
    {
        $data['old_about'] = $this->model('About_Model')->getSingle();

        $this->view('admin/master/header');
        $this->view('admin/home/about', $data);
        $this->view('admin/master/footer');
    }

    public function update()
    {
        $upload = new Upload;
        $data['image'] = $upload->image($_FILES);
        $data['input'] = $_POST;

        if (file_exists($data['input']['old_path'])) {
            if ($data['image']['error'] === 0 && !is_null($data['input']['old_image'])) {
                unlink($data['input']['old_path']);
            }
        }

        if ($this->model('About_Model')->update($data) > 0) {
            header('Location: ' . BASEPATH . 'admin/about');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/about');
            exit;
        }
    }
}

<?php

class Team extends Controller
{

    public function index()
    {
        $data['old_team'] = $this->model('Team_Model')->getAll();

        $this->view('admin/master/header');
        $this->view('admin/home/team', $data);
        $this->view('admin/master/footer');
    }

    public function tambah()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES);
        $data['input'] = $_POST;
        $data['image'] = $image;
        if (($this->model('Team_model')->tambah($data)) > 0) {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        }
    }

    public function getTeam()
    {
        $id = $_POST['id'];
        $data['get_team'] = $this->model('Team_Model')->single($id);

        echo json_encode($data);
    }

    public function getLink()
    {
        $id = $_POST['id'];
        $data['get_link'] = $this->model('Team_Model')->single($id, 'link');

        echo json_encode($data);
    }

    public function update()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES);
        $data['input'] = $_POST;
        $data['image'] = $image;

        if (($this->model('Team_model')->update($data)) > 0) {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        }
    }

    public function updateLink()
    {

        $data['input'] = $_POST;

        if (($this->model('Team_model')->updateLink($data)) > 0) {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        }
    }

    public function delete()
    {

        $id = $_POST['id'];
        $query = 'SELECT path FROM tbl_team WHERE id=:id';
        $img = implode($this->model('Team_Model')->single($id, $query));

        if (file_exists($img)) {
            unlink($img);
        }
        if (!file_exists($img)) {
            if (($this->model('Team_model')->delete($id)) > 0) {
                header('Location: ' . BASEPATH . 'admin/team');
                exit;
            } else {
                header('Location: ' . BASEPATH . 'admin/team');
                exit;
            }
        }
    }
}

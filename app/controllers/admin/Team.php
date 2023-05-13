<?php

class Team extends Controller
{

    public function index()
    {
        $query = 'SELECT tm.*, tml.twitter, tml.facebook, tml.instagram, tml.linkedin FROM `tbl_team` as tm LEFT JOIN tbl_team_link as tml ON tml.id_team = tm.id;';
        $data['old_team'] = $this->model('Team_Model')->getAll($query);

        $this->view('admin/master/header');
        $this->view('admin/home/team', $data);
        $this->view('admin/master/footer');
    }

    public function getSingle()
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
    public function gL()
    {

        $data['get_link'] = $this->model('Team_Model')->single(16, 'link');

        echo json_encode($data);
    }

    public function create()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES);
        $data['input'] = $_POST;
        $data['image'] = $image;
        if (($this->model('Team_model')->tambah($data)) > 0) {
            Flasher::setFlash('berhasil', 'ditambah', 'success');
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        }
    }

    public function update()
    {
        $upload = new Upload;
        $image = $upload->image($_FILES);
        $upload->imageUpdate($image['error'], $_POST['old_path']);

        $data['input'] = $_POST;
        $data['image'] = $image;

        if (($this->model('Team_model')->update($data)) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        }
    }

    public function updateLink()
    {

        $data['input'] = $_POST;

        if (($this->model('Team_model')->updateLink($data)) > 0) {
            Flasher::setFlash('(SOSMED) berhasil', 'diubah', 'success');
            header('Location: ' . BASEPATH . 'admin/team');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
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
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEPATH . 'admin/team');
                exit;
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger');
                header('Location: ' . BASEPATH . 'admin/team');
                exit;
            }
        }
    }
}

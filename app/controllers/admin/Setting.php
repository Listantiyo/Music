<?php

class Setting extends Controller
{

    public function index()
    {
        $data['old_setting'] = $this->model('Setting_Model')->getSingle();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $this->view('admin/master/header');
        $this->view('admin/setting/index', $data);
        $this->view('admin/master/footer');
    }

    public function update()
    {
        $upload = new Upload;
        $is['file'] = $_FILES['logo'];
        $data['image']['logo']  = $upload->image($is);
        if ($data['image']['logo']['error'] != 4 && $_POST['old_logo'] !== '') {
            if (file_exists($_POST['old_logo'])) {
                unlink($_POST['old_logo']);
            }
        }
        $is['file'] = $_FILES['slide-1'];
        $data['image']['slide_1'] = $upload->image($is);
        if ($data['image']['slide_1']['error'] != 4 && $_POST['old_slide-1'] !== '') {
            if (file_exists($_POST['old_slide-1'])) {
                unlink($_POST['old_slide-1']);
            }
        }
        $is['file'] = $_FILES['slide-2'];
        $data['image']['slide_2'] = $upload->image($is);
        if ($data['image']['slide_2']['error'] != 4 && $_POST['old_slide-2'] !== '') {
            if (file_exists($_POST['old_slide-2'])) {
                unlink($_POST['old_slide-2']);
            }
        }
        $is['file'] = $_FILES['slide-3'];
        $data['image']['slide_3'] = $upload->image($is);
        if ($data['image']['slide_3']['error'] != 4 && $_POST['old_slide-3'] !== '') {
            if (file_exists($_POST['old_slide-3'])) {
                unlink($_POST['old_slide-3']);
            }
        }
        $data['input'] = $_POST;

        if ($this->model('Setting_Model')->update($data) > 0) {
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        } else {
            header('Location: ' . BASEPATH . 'admin/setting');
            exit;
        }
    }
}

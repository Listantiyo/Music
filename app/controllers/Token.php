<?php
date_default_timezone_set('Asia/Jakarta');

class Token extends Controller
{

    public function index()
    {
        if (isset($_SESSION['token'])) {
            header('Location: ' . BASEPATH . 'admin');
        }
        $this->view('user/token/index');
    }

    public function validateToken()
    {


        $inputToken = $_POST['token'];
        $query = "SELECT brand FROM tbl_setting";
        $brand = $this->model('Setting_Model')->getSingle($query);
        $token = strtolower($brand['brand']) . date('d');

        if ($inputToken != $token) {
            $_SESSION['tokenFlash'] = true;
            header('Location: ' . BASEPATH . 'token');
            exit;
        }

        $_SESSION['token'] = true;
        header('Location: ' . BASEPATH . 'admin');
        exit;
    }

    public function logout()
    {
        unset($_SESSION['token']);
        header('Location: ' . BASEPATH . 'token');
    }
}

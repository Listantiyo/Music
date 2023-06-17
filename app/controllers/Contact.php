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

    // public function mail()
    // {
    //     ini_set('SMTP', 'smtp.gmail.com');
    //     ini_set('auth_username', 'listantiyowiharjanto@gmail.com');
    //     ini_set('auth_password', 'listantiyowiharjanto31082003');
    //     ini_set('smtp_port', 587);
    //     // ini_set('sendmail_path', "C:\xampp\xampp8160\sendmail\sendmail.exe -t");

    //     // the message
    //     $msg = $_POST['message'];
    //     $name = $_POST['name'];
    //     $from = $_POST['email'];
    //     $to = 'listantiyowiharjanto@gmail.com';
    //     $subject = $name . '-' . $_POST['subject'];
    //     $headers = 'From:' . $from;
    //     // use wordwrap() if lines are longer than 70 characters
    //     $msg = wordwrap($msg, 70);
    //     ini_set("sendmail_from", $from);

    //     // send email
    //     mail($to, $subject, $msg, $headers);
    // }
}

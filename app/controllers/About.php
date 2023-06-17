<?php

class About extends Controller
{

    public function index()
    {
        $data['location'] = 'About';
        $data['get_about'] = $this->model('About_Model')->getSingle();
        $query = 'SELECT t.name,t.title,t.path,tl.twitter,tl.facebook,tl.instagram,tl.linkedin FROM tbl_team AS t LEFT JOIN tbl_team_link AS tl ON t.id = tl.id_team GROUP BY t.id';
        $data['get_team'] = $this->model('Team_Model')->getAll($query);
        $data['testimoni'] = $this->model('Testimoni_Model')->getAll();

        $this->view('user/master/header', $data);
        $this->view('user/about/index', $data);
        $this->view('user/master/footer');
    }
}

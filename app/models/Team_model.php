<?php

class Team_model
{

    private $table = 'tbl_team';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambah($data)
    {
        // var_dump($data);
        // die;
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name, :title, :img, :path, now(), now())";
        $this->db->query($query);
        $this->db->bind('name', $data['input']['name']);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('img', $data['image']['name']);
        $this->db->bind('path', $data['image']['path']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

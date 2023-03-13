<?php

class Gallery_Model
{

    private $table = 'tbl_gallery';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll($query = null)
    {
        if (is_null($query)) {
            $query = 'SELECT * FROM ' . $this->table;
        }
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambah($data)
    {

        $query = " INSERT INTO " . $this->table . " VALUES ('',:name, :path, now() , now() ) ";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('path', $data['path']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

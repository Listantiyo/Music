<?php

class Packet_Model
{

    private $table = 'tbl_packet';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSingle($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=' . $id);
        $this->db->execute();
        return $this->db->singel();
    }

    public function getAll($query = null)
    {
        if ($query === null) {
            $query = 'SELECT * FROM ' . $this->table;
        }
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function create($data)
    {

        $query = "INSERT INTO " . $this->table . " VALUES ('', :title, :desc, :img, :path, now(), now())";
        $this->db->query($query);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('desc', $data['input']['descrb']);
        $this->db->bind('img', $data['image']['error'] != 0 ? null :  $data['image']['name']);
        $this->db->bind('path', $data['image']['error'] != 0 ? null : $data['image']['path']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

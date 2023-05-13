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

        $query = "INSERT INTO " . $this->table . " VALUES ('', :title, :descrb, :path, now(), now())";
        $this->db->query($query);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('descrb', $data['input']['descrb']);
        $this->db->bind('path', $data['image']['error'] != 0 ? null : $data['image']['path']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE " . $this->table . " SET title=:title, descrb=:descrb, path=:path, updated_at=now() WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['input']['id']);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('descrb', $data['input']['descrb']);
        $this->db->bind('path', $data['image']['error'] != 0 ? $data['input']['old_path'] : $data['image']['path']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

<?php

class Service_Model
{

    private $table = 'tbl_service';
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
        $query = "INSERT INTO " . $this->table . " VALUES ('', :icon, :title, :desc, now(), now())";
        $this->db->query($query);
        $this->db->bind('icon', strtolower($data['icon']));
        $this->db->bind('title', $data['title']);
        $this->db->bind('desc', $data['desc']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {

        $query = "UPDATE " . $this->table . " SET icon=:icon ,title=:title, descrb=:desc, updated_at=now() wHERE id=:id";
        $this->db->query($query);
        $this->db->bind('icon', strtolower($data['icon']));
        $this->db->bind('title', $data['title']);
        $this->db->bind('desc', $data['desc']);
        $this->db->bind('id', $data['id']);
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

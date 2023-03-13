<?php

class Packet_List_Model
{

    private $table = 'tbl_packet_list';
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
        if (is_null($query)) {
            $query = 'SELECT * FROM ' . $this->table;
        }
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :title, :items, :category_id, now(), now())";
        $this->db->query($query);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('items', json_encode($data['input']['item']));
        $this->db->bind('category_id', $data['input']['category-packet']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

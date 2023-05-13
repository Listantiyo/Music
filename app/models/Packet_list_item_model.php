<?php

class Packet_List_Item_Model
{

    private $table = 'tbl_packet_list_item';
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

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getPacketItems($items)
    {
        $query = "SELECT name, path FROM " . $this->table . " WHERE id in (" . $items . ")";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name, :img, :path, now(), now())";
        $this->db->query($query);
        $this->db->bind('name', $data['input']['name']);
        $this->db->bind('img', $data['image']['error'] != 0 ? null :  $data['image']['name']);
        $this->db->bind('path', $data['image']['error'] != 0 ? null : $data['image']['path']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {

        $query = "UPDATE " . $this->table . " SET name=:name, img=:img, path=:path, updated_at=now() WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['input']['id']);
        $this->db->bind('name', $data['input']['name']);
        $this->db->bind('img', $data['image']['error'] != 0 ? $data['input']['old_itemImage'] :  $data['image']['name']);
        $this->db->bind('path', $data['image']['error'] != 0 ? $data['input']['old_itemPath'] : $data['image']['path']);
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

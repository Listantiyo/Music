<?php

class About_Model
{

    private $table = 'tbl_about';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSingle()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->execute();
        return $this->db->singel();
    }

    public function update($data)
    {

        //cek is null
        $cek = $this->getSingle();
        if (empty($cek)) {
            $query = "INSERT INTO " . $this->table . " VALUES (
                '', 
                :title, 
                :text1, 
                :text2, 
                :paragraph, 
                :img, 
                :path, 
                now(), 
                now())";
            $this->db->query($query);
            $this->db->bind('title', $data['input']['title']);
            $this->db->bind('text1', $data['input']['text-1']);
            $this->db->bind('text2', $data['input']['text-2']);
            $this->db->bind('paragarph', $data['input']['paragraph']);
            $this->db->bind('img', $data['image']['error'] === 0 ? $data['image']['name'] : null);
            $this->db->bind('path', $data['image']['error'] === 0 ? $data['image']['path'] : null);
            $this->db->execute();
            return $this->db->rowCount();
            exit;
        }
        //is not null
        $query = "UPDATE " . $this->table . " SET 
        title=:title,
        text1=:text1, 
        text2=:text2, 
        paragraph=:paragraph, 
        img=:img, 
        path=:path,
        updated_at=now()";
        $this->db->query($query);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('text1', $data['input']['text-1']);
        $this->db->bind('text2', $data['input']['text-2']);
        $this->db->bind('paragraph', $data['input']['paragraph']);
        $this->db->bind('img', $data['image']['error'] === 0 ? $data['image']['name'] : $data['input']['old_image']);
        $this->db->bind('path', $data['image']['error'] === 0 ? $data['image']['path'] : $data['input']['old_path']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

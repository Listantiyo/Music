<?php

class Team_model
{

    private $table = 'tbl_team';
    private $table_link = 'tbl_team_link';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function single($id = null, $query = null)
    {
        if ($query === 'link') {
            $query = 'SELECT * FROM ' . $this->table_link . ' WHERE id_team =:id';
        }
        if ($query === null) {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        }
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->singel();
    }

    public function getAll($query = null)
    {
        if ($query === 'link') {
            $query = 'SELECT * FROM ' . $this->table;
        }
        if ($query === null) {
            $query = 'SELECT * FROM ' . $this->table;
        }
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambah($data)
    {

        $query = "INSERT INTO " . $this->table . " VALUES ('', :name, :title, :img, :path, now(), now())";
        $this->db->query($query);
        $this->db->bind('name', $data['input']['name']);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('img', $data['image']['name']);
        $this->db->bind('path', $data['image']['path']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {

        $query = 'UPDATE ' . $this->table . ' SET name=:name,title=:title,img=:img,path=:path,updated_at=now() WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['input']['id']);
        $this->db->bind('name', $data['input']['name']);
        $this->db->bind('title', $data['input']['title']);
        $this->db->bind('img', $data['image']['error'] === 4 ? $data['input']['old_image'] : $data['image']['name']);
        $this->db->bind('path', $data['image']['error'] === 4 ? $data['input']['old_path'] : $data['image']['path']);
        $this->db->execute();
        $this->db->rowCount();
    }

    public function updateLink($data)
    {

        $check = $this->single($data['input']['id_team'], 'link');
        var_dump('ok');
        if (!empty($check)) {

            $query = "UPDATE " . $this->table_link . " SET twitter=:twitter,facebook=:facebook,instagram=:instagram,linkedin=:linkedin,updated_at=now() WHERE id_team=" . $data['input']['id_team'];
        }
        if (empty($check)) {

            $query = "INSERT INTO " . $this->table_link . " VALUES ('', :id_team, :twitter, :facebook, :instagram, :linkedin, now(), now())";
        }
        $this->db->query($query);

        if (empty($check)) {
            $this->db->bind('id_team', $data['input']['id_team']);
        }

        $this->db->bind('twitter', $data['input']['twitter']);
        $this->db->bind('facebook', $data['input']['facebook']);
        $this->db->bind('instagram', $data['input']['instagram']);
        $this->db->bind('linkedin', $data['input']['linkedin']);
        $this->db->debug();
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $this->db->rowCount();
    }
}

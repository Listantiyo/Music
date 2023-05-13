<?php

class Setting_Model
{

    private $table = 'tbl_setting';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSingle($query = null)
    {
        if (is_null($query)) {
            $query = 'SELECT * FROM ' . $this->table;
        }
        $this->db->query($query);
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
                :brand, 
                :logo, 
                :email, 
                :phone, 
                :addres, 
                :twitter, 
                :facebook, 
                :instagram, 
                :linkedin, 
                :slide_title, 
                :slide_desc, 
                :slide_1, 
                :slide_2, 
                :slide_3, 
                :packet_desc, 
                :packet_desc, 
                now(), 
                now())";
            $this->db->query($query);
            $this->db->bind('brand', $data['input']['brand']);
            $this->db->bind('logo', $data['image']['logo']['error'] === 4 ? null : $data['image']['logo']['path']);
            $this->db->bind('email', $data['input']['email']);
            $this->db->bind('phone', $data['input']['phone']);
            $this->db->bind('addres', $data['input']['addres']);
            $this->db->bind('twitter', $data['input']['twitter']);
            $this->db->bind('facebook', $data['input']['facebook']);
            $this->db->bind('instagram', $data['input']['instagram']);
            $this->db->bind('linkedin', $data['input']['linkedin']);
            $this->db->bind('slide_title', $data['input']['slide_title']);
            $this->db->bind('slide_desc', $data['input']['slide_desc']);
            $this->db->bind('slide_1', $data['image']['slide_1']['error'] === 4 ? null : $data['image']['slide_1']['path']);
            $this->db->bind('slide_2', $data['image']['slide_2']['error'] === 4 ? null : $data['image']['slide_2']['path']);
            $this->db->bind('slide_3', $data['image']['slide_3']['error'] === 4 ? null : $data['image']['slide_3']['path']);
            $this->db->bind('packet_desc', $data['input']['packet-desc']);
            $this->db->bind('packet_desc', $data['input']['service-desc']);
            $this->db->execute();
            return $this->db->rowCount();
            exit;
        }
        //is not null
        $query = "UPDATE " . $this->table . " SET 
        brand=:brand, 
        logo=:logo, 
        email=:email, 
        phone=:phone, 
        addres=:addres, 
        twitter=:twitter, 
        facebook=:facebook, 
        instagram=:instagram, 
        linkedin=:linkedin,
        slide_title=:slide_title, 
        slide_desc=:slide_desc,  
        slide_1=:slide_1, 
        slide_2=:slide_2, 
        slide_3=:slide_3, 
        packet_desc=:packet_desc, 
        service_desc=:service_desc, 
        updated_at=now()";
        $this->db->query($query);
        $this->db->bind('brand', $data['input']['brand']);
        $this->db->bind('logo', $data['image']['logo']['error'] === 4 ? $data['input']['old_logo'] : $data['image']['logo']['path']);
        $this->db->bind('email', $data['input']['email']);
        $this->db->bind('phone', $data['input']['phone']);
        $this->db->bind('addres', $data['input']['addres']);
        $this->db->bind('twitter', $data['input']['twitter']);
        $this->db->bind('facebook', $data['input']['facebook']);
        $this->db->bind('instagram', $data['input']['instagram']);
        $this->db->bind('linkedin', $data['input']['linkedin']);
        $this->db->bind('slide_title', $data['input']['slide_title']);
        $this->db->bind('slide_desc', $data['input']['slide_desc']);
        $this->db->bind('slide_1', $data['image']['slide_1']['error'] === 4 ? $data['input']['old_slide-1'] : $data['image']['slide_1']['path']);
        $this->db->bind('slide_2', $data['image']['slide_2']['error'] === 4 ? $data['input']['old_slide-2'] : $data['image']['slide_2']['path']);
        $this->db->bind('slide_3', $data['image']['slide_3']['error'] === 4 ? $data['input']['old_slide-3'] :  $data['image']['slide_3']['path']);
        $this->db->bind('packet_desc', $data['input']['packet-desc']);
        $this->db->bind('service_desc', $data['input']['service-desc']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

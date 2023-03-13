<?php

class Controller{

    public function view($path, $data = null){
        require_once '../app/views/'.$path.'.php';
    }

    public function model($name){
        require_once '../app/models/'.$name.'.php';
        return new $name;
    }

    

}
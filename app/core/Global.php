<?php

class Globala extends Controller
{

    public function __construct($type)
    {
        $data = $this->model('Setting_Model')->getSingle();
        self::show($data, $type);
    }

    public static function show($data, $type)
    {
        echo $data[$type];
    }
}

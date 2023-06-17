<?php

class Globala extends Controller
{

    public function __construct($type, $link = false)
    {
        $data = $this->model('Setting_Model')->getSingle();
        self::show($data, $type, $link);
    }

    public static function show($data, $type, $link)
    {
        if ($link) {
            echo BASEPATH . $data[$type];
            return;
        }

        if (isset($data[$type])) {
            echo $data[$type];
        }
    }
}

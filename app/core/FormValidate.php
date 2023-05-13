<?php

class Validate
{
    public function form(array $input)
    {
        foreach ($input as $key => $value) {
            if (is_numeric(strripos($key, 'old'))) continue;
            if ($value == null) return false;
        }
        return true;
    }
}

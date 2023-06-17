<?php

class Upload
{
    public function image($data, $max_file_size = 1, $location = 'upload')
    {
        // storing
        $name       = $data['file']['name'];
        $size       = $data['file']['size'];
        $error      = $data['file']['error'];
        $file_tmp   = $data['file']['tmp_name'];

        $allowed_exstension = array('jpg', 'jpeg', 'png'); // declare extension
        $getx = explode('.', $name); // explode $name to array

        if (str_contains($getx[0], '(') || str_contains($getx[0], ')') || str_contains($getx[0], ' ')) $new_getx = str_replace(['(', ')', ' '], '', $getx[0]);
        else $new_getx = $getx[0];
        $extension = strtolower(end($getx)); // get lowercase str from last array of $getx = extension (format)
        $nameNew = $location . '_' . $new_getx . uniqid() . '.' . $extension; //newnamefile
        $path = 'img/' . $location . '/'; // create store path location

        if ($error != 4) {

            if (in_array($extension, $allowed_exstension) === false)
                return 'FORMAT GAMBAR YANG DI IJINKAN HANYA  ( ' . implode(', ', $allowed_exstension) . ' ) ';
            if ($size > 1044070 * $max_file_size) //$max_file_size default 1mb 
                return 'UKURAN GAMBAR TERLALU BESAR';
            if (!is_dir($path)) // cek & pindah directory file 
                return 'FOLDER TIDAK ADA';
            if (!is_file($path . $nameNew))
                move_uploaded_file($file_tmp, $path . $nameNew);
            if (!is_file($path . $nameNew))
                return 'GAGAL MENGUPLOAD GAMBAR';

            return $data['image'] = ['name' => $nameNew, 'error' => $error, 'path' => $path . $nameNew];
        } else {
            return $data['image'] = ['error' => $error];
        }

        // if ($error != 4) return $data['image'] = ['error' => $error];

    }

    public function imageUpdate($error, $old_path)
    {
        //? update need new image err = 0 && old_path not null || ''
        if ($error == 4 || $old_path == null) return false;
        if (!file_exists($old_path)) return false;
        unlink($old_path);
    }

    public function imageDelete($path)
    {
        if (!file_exists($path)) return false;
        unlink($path);
    }
}

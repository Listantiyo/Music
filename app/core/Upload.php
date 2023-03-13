<?php

class Upload
{

    public function image($data, $location = 'upload', $file_size = 1)
    {
        $allowed_exstension = array('jpg', 'jpeg', 'png');
        $name = $data['file']['name'];
        $getx = explode('.', $name);
        $extension = strtolower(end($getx));
        $size = $data['file']['size'];
        $file_tmp = $data['file']['tmp_name'];
        $error = $data['file']['error'];
        //newnamefile
        $nameNew = $getx[0] . uniqid() . '.' . $extension;
        $path = 'img/' . $location . '/';

        if ($error != 4) {
            # code...
            if (in_array($extension, $allowed_exstension) === true) {
                //1mb
                if ($size < 1044070 * $file_size) {
                    if (is_dir($path)) {
                        //pindah directory file
                        move_uploaded_file($file_tmp, $path . $nameNew);
                        //cek moved file
                        if (is_file($path . $nameNew)) {
                            return $data['image'] = ['name' => $nameNew, 'error' => $error, 'path' => $path . $nameNew];
                        } else {
                            echo 'GAGAL MENGUPLOAD GAMBAR';
                        }
                    } else {
                        echo 'FOLDER TIDAK ADA';
                    }
                } else {
                    echo 'UKURAN FILE TERLALU BESAR';
                }
            } else {
                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
            }
        } else {
            return $data['image'] = ['error' => $error];
        }
    }
}

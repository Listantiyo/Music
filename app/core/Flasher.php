<?php

class Flasher
{

    public static function setFlash($pesan, $aksi, $tipe, $jenis = 'Data')
    {

        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
            'jenis' => $jenis,
        ];
    }


    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            ' . $_SESSION['flash']['jenis'] . ' <strong> ' . $_SESSION['flash']['pesan'] . ' </strong>' . $_SESSION['flash']['aksi'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

            unset($_SESSION['flash']);
        }
    }

    public static function tokenFlash()
    {
        if (isset($_SESSION['tokenFlash'])) {
            echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>Invalid Token</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';

            unset($_SESSION['tokenFlash']);
        }
    }
}

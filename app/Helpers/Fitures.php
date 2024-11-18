<?php

namespace App\Helpers;

use App\Models\AppFitur;

class Fitures
{
    public static function getFiturAktif()
    {
        $fitur = AppFitur::where('aktif', 'Y')->get();
        $hasil = [];

        foreach ($fitur as $f) {
            // Mengambil view berdasarkan nama_fitur
            if (view()->exists("inc.fitur.{$f->nama_fitur}")) {
                $hasil[] = "inc.fitur.{$f->nama_fitur}";
            }
        }

        return $hasil;
    }

    public static function isMainMenuTemplateActive()
    {
        $fitur = AppFitur::where('nama_fitur', '_mainmenu_template')->first();
        return $fitur && $fitur->aktif === 'Y';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function siswa_profil()
    {
        return view('siswa.siswa_profil');
    }
    public function siswa_lcks_penilaian()
    {
        return view('siswa.siswa_lcks_penilaian');
    }
    public function siswa_lcks_absensi()
    {
        return view('siswa.siswa_lcks_absensi');
    }
    public function siswa_lcks_kegiatan_eskul()
    {
        return view('siswa.siswa_lcks_kegiatan_eskul');
    }
    public function siswa_lcks_prestasi_siswa()
    {
        return view('siswa.siswa_lcks_prestasi_siswa');
    }
    public function siswa_lcks_praktek_kerja()
    {
        return view('siswa.siswa_lcks_praktek_kerja');
    }
    public function siswa_lcks_catatan()
    {
        return view('siswa.siswa_lcks_catatan');
    }
    public function siswa_remedial()
    {
        return view('siswa.siswa_remedial');
    }
}

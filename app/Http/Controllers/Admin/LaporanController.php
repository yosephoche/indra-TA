<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\CalonSiswa;

class LaporanController extends Controller
{
    public function index()
    {
        $calon_siswa = CalonSiswa::with('jadwal', 'kelas', 'jurusan')->paginate(10);

        return view('pages.admin.laporan.index', compact('calon_siswa'));
    }

    public function cetak()
    {
        $calon_siswa = CalonSiswa::with('jadwal', 'kelas', 'jurusan')->get();
        return view('pages.print.laporan', compact('calon_siswa'));
    }
}

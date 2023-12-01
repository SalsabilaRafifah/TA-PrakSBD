<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $rekam_medis = DB::table('rekam_medis')
            ->join('pasien', 'rekam_medis.id_pasien', '=', 'pasien.id')
            ->join('dokter', 'rekam_medis.id_dokter', '=', 'dokter.id')
            ->select(
                'pasien.nama as nama_pasien',
                'dokter.nama as nama_dokter',
                'rekam_medis.tgl_periksa',
                'rekam_medis.keluhan',
                'rekam_medis.diagnosa'
            )
            ->paginate(10);

        return view('admin.join', ['data' => $rekam_medis]);
    }

    public function data_dokter()
    {
        $dokter = DB::table('dokter')->paginate(10);
        return view('admin.data_dokter', ['dokter' => $dokter]);
    }

    public function data_pasien()
    {
        $pasien = DB::table('pasien')->paginate(10);
        return view('admin.data_pasien', ['pasien' => $pasien]);
    }

    public function poliklinik()
    {
        $poliklinik = DB::table('poliklinik')->paginate(10);
        return view('admin.poliklinik', ['poliklinik' => $poliklinik]);
    }

    public function rekam_medis()
    {
        $rekammedisinap = DB::table('rekam_medis')->join('pasien', 'rekam_medis.id_pasien', '=', 'pasien.id')->select('rekam_medis.*', 'pasien.nama')->paginate(10);
        return view('admin.rekam_medis', ['rekammedis' => $rekammedisinap]);
    }

    public function obat_perlengkapan()
    {
        $obat = DB::table('obat')->paginate(10);
        return view('admin.obat_perlengkapan', ['obat' => $obat]);
    }
}
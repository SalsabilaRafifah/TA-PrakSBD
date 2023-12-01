<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RekamMedisController extends Controller
{
    public function tambah_rekammedis(){
        return view('admin.tambah_rekammedis');
    }
    
    public function store_rekammedis(Request $request) {
        $request->validate([
            'pasien' => 'required|string',
            'id_dokter' => 'required|numeric',
            'id_poli' => 'required|numeric',
            'keluhan' => 'required',
            'tgl_periksa' => 'required',
            'diagnosa' => 'nullable',
        ]);
    
        $pasien = DB::table('pasien')->where('nama', $request->pasien)->first();
        $dokter = DB::table('dokter')->where('id', $request->id_dokter)->first();
        $poliklinik = DB::table('poliklinik')->where('id', $request->id_poli)->first();
    
        if ($pasien == null) {
            return redirect('/tambah_rekammedis')->with('pasien', 'Nama pasien belum terdaftar');
        }
    
        if ($dokter == null) {
            return redirect('/tambah_rekammedis')->with('dokter', 'Dokter belum terdaftar');
        }
    
        if ($poliklinik == null) {
            return redirect('/tambah_rekammedis')->with('poliklinik', 'Poliklinik belum terdaftar');
        }
    
        $save = DB::table('rekam_medis')->insert([
            'id_pasien' => $pasien->id,
            'keluhan' => $request->keluhan,
            'id_dokter' => $dokter->id,
            'id_poli' => $poliklinik->id,
            'tgl_periksa' => $request->tgl_periksa,
            'diagnosa' => $request->diagnosa,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        if ($save) {
            return redirect('/rekam_medis')->with('sukses', 'Data berhasil ditambahkan');
        }
    }
    
    public function update_rekammedis(Request $request) {
        $request->validate([
            'pasien' => 'required|string',
            'id_dokter' => 'required|numeric',
            'id_poli' => 'required|numeric',
            'keluhan' => 'required',
            'tgl_periksa' => 'required',
            'diagnosa' => 'nullable',
        ]);
    
        $rekammedis = DB::table('rekam_medis')->find($request->id);
        $pasien = DB::table('pasien')->find($rekammedis->id_pasien);
        $dokter = DB::table('dokter')->where('id', $request->id_dokter)->first();
        $poliklinik = DB::table('poliklinik')->where('id', $request->id_poli)->first();
    
        if ($dokter == null) {
            return redirect('/edit_rekammedis/' . $request->id)->with('dokter', 'Dokter belum terdaftar');
        }
    
        if ($poliklinik == null) {
            return redirect('/edit_rekammedis/' . $request->id)->with('poliklinik', 'Poliklinik belum terdaftar');
        }
    
        DB::table('rekam_medis')->where('id', $request->id)->update([
            'id_pasien' => $pasien->id,
            'keluhan' => $request->keluhan,
            'id_dokter' => $dokter->id,
            'id_poli' => $poliklinik->id,
            'tgl_periksa' => $request->tgl_periksa,
            'diagnosa' => $request->diagnosa,
            'updated_at' => now()
        ]);
    
        return redirect('/rekam_medis')->with('update', 'Data rekam medis berhasil diupdate');
    }    
    
    public function hapus_rekammedis(Request $request){
        $id = $request->id;
        DB::table('rekam_medis')->delete($id);
        return redirect('/rekam_medis')->with('hapus', 'Data rekam medis jalan berhasil dihapus');
    }
    
    public function edit_rekammedis($id){
        $data = DB::table('rekam_medis')->find($id);
        $pasien = DB::table('pasien')->find($data->id_pasien);
        $dokter = DB::table('dokter')->find($data->id_dokter); // Mengambil data dokter berdasarkan id_dokter pada rekam_medis
        $poliklinik = DB::table('poliklinik')->find($data->id_poli);
        return view('admin.edit_rekammedis', ['data' => $data, 'pasien' => $pasien, 'dokter' => $dokter, 'poliklinik' => $poliklinik]);
    }
    
    public function cari_rekammedis(Request $request){
        $rekammedis = DB::table('pasien')->where('nama', 'like', "%$request->keyword%")->join('rekam_medis', 'pasien.id', '=', 'rekam_medis.id_pasien')->select('pasien.nama', 'rekam_medis.*')->get();
        return view('admin.cari_rekammedis', ['rekammedis' => $rekammedis, 'keyword' => $request->keyword]);
    }
}

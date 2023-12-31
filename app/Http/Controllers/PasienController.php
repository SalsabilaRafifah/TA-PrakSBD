<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PasienController extends Controller
{
    public function tambah_pasien(){
        return view('admin.tambah_pasien');
    }
    
    public function store_pasien(Request $request){
        
        $request->validate([
            'nama' => 'required|string',
            'nomor_identitas' => 'nullable|string',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|max:15',
            'alamat' => 'required',
            ]);
            
        $save = DB::table('pasien')->insert([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'nomor_identitas' => $request->nomor_identitas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/data_pasien')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_pasien(Request $request){
        $id = $request->id;
        DB::table('pasien')->delete($id);
        return redirect('/data_pasien')->with('hapus', 'Data pasien berhasil dihapus');
    }
    
    public function edit_pasien($id){
        $data = DB::table('pasien')->find($id);
        return view('admin.edit_pasien', ['data' => $data]);
    }
    
    public function update_pasien(Request $request){
        
        $request->validate([
            'nama' => 'required|string',
            'nomor_identitas' => 'nullable|string',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
            'alamat' => 'required'
            ]);
        
        $pasien = DB::table('pasien')->find($request->id);
        
        DB::table('pasien')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'nomor_identitas' => $request->nomor_identitas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/data_pasien')->with('update', 'Data pasien berhasil diupdate');
    }
    
    public function cari_pasien(Request $request){
        $pasien = DB::table('pasien')->where('nama', 'like', "%$request->keyword%")->get();
        return view('admin.cari_pasien', ['pasien' => $pasien, 'keyword' => $request->keyword]);
    }
}

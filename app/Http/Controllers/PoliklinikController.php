<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//redirect
use Illuminate\Http\RedirectResponse;
//database
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PoliklinikController extends Controller
{
    public function tambah_poliklinik(){
        return view('admin.tambah_poliklinik');
    }
    
    public function store_poliklinik(Request $request){
        
        $request->validate([
            'nama_poli' => 'required',
            'gedung' => 'required',
            ]);
            
        $save = DB::table('poliklinik')->insert([
            'nama_poli' => $request->nama_poli,
            'gedung' => $request->gedung,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            if($save){
                return redirect('/poliklinik')->with('sukses', 'Data berhasil ditambahkan');
            }
    }
    
    public function hapus_poliklinik(Request $request){
        $id = $request->id;
        DB::table('poliklinik')->delete($id);
        return redirect('/poliklinik')->with('hapus', 'Data poliklinik berhasil dihapus');
    }
    
    public function edit_poliklinik($id){
        $data = DB::table('poliklinik')->find($id);
        return view('admin.edit_poliklinik', ['data' => $data]);
    }
    
    public function update_poliklinik(Request $request){
        
        $request->validate([
            'nama_poli' => 'required',
            'gedung' => 'required',
            ]);
            
        $poliklinik = DB::table('poliklinik')->find($request->id);
        
        DB::table('poliklinik')->where('id', $request->id)->update([
            'nama_poli' => $request->nama_poli,
            'gedung' => $request->gedung,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        
        return redirect('/poliklinik')->with('update', 'Data poliklinik berhasil diupdate');
    }
    
    public function cari_poliklinik(Request $request){
        $poliklinik = DB::table('poliklinik')->where('nama_poli', 'like', "%$request->keyword%")->get();
        return view('admin.cari_poliklinik', ['poliklinik' => $poliklinik, 'keyword' => $request->keyword]);
    }
}

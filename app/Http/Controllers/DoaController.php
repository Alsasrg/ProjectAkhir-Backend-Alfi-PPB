<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use Illuminate\Http\Request;

class DoaController extends Controller
{
    //get doa by kategori
    public function getdoa(){
        $data = Doa::all();
        if($data){
            return response()->json([
                'nama_doa'=>200,
                'message'=>'berhasil menampilkan data',
                'data'=> $data
            ]);
        }
        return response()->json([
            'status'=> 404,
            'message'=> 'Data tidak tersedia'
        ]);
    }
    
    public function getDoaKategori($id_kategori)
    {
        $data = Doa::where('id_kategori', $id_kategori)->get();
        return response()->json(['data' => $data]);
    }

    public function postdoa(Request $request){
        $data = Doa::create([
            'nama_doa' => $request->nama_doa,
            'id_kategori' => $request->id_kategori,
            'isi_doa' => $request->isi_doa,
        ]);
        if($data){
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menambahkan doa',
                'data' =>$data
            ]);
        }
        return response()->json([
            'status' => 404, 
            'message' => 'Gagal menambahkan data'
        ]);
    }
}
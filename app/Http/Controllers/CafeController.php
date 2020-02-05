<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Cafe;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cafe=Cafe::all();
        $data=['cafe'=>$cafe];
        return $data;
    }

 
    public function create(Request $request)
    {
        //
        $cafe=new Cafe();
        $cafe->nama_cafe=$request->nama_cafe;
        $cafe->alamat=$request->alamat;
        $cafe->pemilik=$request->pemilik;
        $cafe->save();

        return "Data Tersimpan";
    }

    public function update(Request $request, $id)
    {
        $cafe=Cafe::find($id);
        $cafe->nama_cafe=$request->nama_cafe;
        $cafe->alamat=$request->alamat;
        $cafe->pemilik=$request->pemilik;
        $cafe->save();

        return "Data Berhasil Diupdate";

    }

    public function delete($id)
    {
        $cafe=Cafe::find($id);
        $cafe->delete();

        return "Terhapus";
    }

    public function detail($id)
    {
        $cafe=Cafe::find($id);

        return $cafe;

    }


   
}

?>

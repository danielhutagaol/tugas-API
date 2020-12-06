<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    //
    public function tampilform($kelasid){

        return view("pertemuan.form",compact("kelasid"));
    }

    public function hapus($id){
        \App\Models\Pertemuan::destroy($id);

        return redirect()->back();
    }

    public function create(Request $request){
        $request->validate([
            "pertemuan" => "required|max:2",
            "tanggal" => "required|date",
            "materi" => "required"
        ]);

        \App\Models\Pertemuan::create([
            "kelas_id" => $request->kelas_id,
            "pertemuan" => $request->pertemuan,
            "tanggal" => $request->tanggal,
            "materi" => $request->materi,
            "kode" => \Str::random(8)
        ]);

        return redirect()->route("kelas.list",["id" => $request->kelas_id]);
    }
}

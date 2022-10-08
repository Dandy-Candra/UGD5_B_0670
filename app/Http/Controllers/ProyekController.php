<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Departemen;

class ProyekController extends Controller
{
    public function index()
    {
    $proyek = Proyek::with('departemens')->paginate(5);
    //render view with posts
    return view('proyek.index', compact('proyek'));
    }

    public function create()
    {
        $departemen = Departemen::get();

        return view('proyek.create',compact('departemen'));
    }


    public function store(Request $request){


        $request->validate([
            'nama_proyek' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'nilai_proyek' => 'required|numeric|gt:10000000'
            ]);

        $departemen = Departemen::where('nama_departemen',$request->departemen) -> first();
        if ($request->status == 'Berjalan')
            $angka = 1;
        else
            $angka = 0;


        Proyek::create([
            'nama_proyek' => $request->nama_proyek,
            'id_departemen' => $departemen->id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'nilai_proyek' => $request->nilai_proyek,
            'status' => $angka
        ]);

        return redirect()->route('proyek.index')->with(['success'=> 'Data Berhasil Ditambah']);
    }


    public function edit($id)
    {
        $data = Proyek::find($id);
        $departemen = Departemen::get();

        return view('proyek.update', compact('data','departemen'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'nilai_proyek' => 'required|numeric|gt:10000000'
            ]);

        $departemen = Departemen::where('nama_departemen',$request->departemen) -> first();
        if ($request->status == 'Berjalan')
            $angka = 1;
        else
            $angka = 0;

        
        Proyek::find($id)->update([
            'nama_proyek' => $request->nama_proyek,
            'id_departemen' => $departemen->id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'nilai_proyek' => $request->nilai_proyek,
            'status' => $angka
        ]);
    

        return redirect()->route('proyek.index')->with(['success'=> 'Data Berhasil Diupdate']);
        
    }


    public function destroy($id)
    {
        Proyek::destroy($id);
        return redirect()->route('proyek.index')->with(['success'=> 'Data Berhasil Dihapus']);
    }
}
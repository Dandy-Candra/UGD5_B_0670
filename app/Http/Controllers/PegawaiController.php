<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;

class PegawaiController extends Controller
{

    public function index()
    {
    $pegawai = Pegawai::with('departemens')->paginate(5);
    //render view with posts
    return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $departemen = Departemen::get();

        return view('pegawai.create',compact('departemen'));
    }

    public function store(Request $request){

        

        $request->validate([
            'nomor_induk_pegawai' => 'required',
            'nama_pegawai' => 'required | string | max:15',
            'email' => 'required|email',
            'telepon' => 'required|regex:/^(0)8[1-9][0-9]{3,4}$/',
            'gaji_pokok' => 'required|numeric|gt:2000000'
            ]);
        
        

        $departemen = Departemen::where('nama_departemen',$request->departemen) -> first();
        if ($request->gender == 'Pria')
            $angka = 1;
        else
            $angka = 0;


        if ($request->status === 'Aktif')
            $status = 1;
         else
             $status = 0;


        


        Pegawai::create([
            'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'id_departemen' => $departemen->id,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'gender' => $angka,
            'gaji_pokok' => $request->gaji_pokok,
            'status' => $status
        ]);

        return redirect()->route('pegawai.index')->with(['success'=> 'Data Berhasil Ditambah']);
    }


    public function edit($id)
    {
        $data = Pegawai::find($id);
        $departemen = Departemen::get();

        return view('pegawai.update', compact('data','departemen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_induk_pegawai' => 'required',
            'nama_pegawai' => 'required  | string | max:15',
            'email' => 'required|email',
            'telepon' => 'required|regex:/^(0)8[1-9][0-9]{3,4}$/',
            'gaji_pokok' => 'required|numeric|gt:2000000'
            ]);

        $departemen = Departemen::where('nama_departemen',$request->departemen) -> first();
        if ($request->gender == 'Pria')
            $angka = 1;
        else
            $angka = 0;


        if ($request->status === 'Aktif')
            $status = 1;
         else
             $status = 0;

        
        Pegawai::find($id)->update([
            'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'id_departemen' => $departemen->id,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'gender' => $angka,
            'gaji_pokok' => $request->gaji_pokok,
            'status' => $status
        ]);
    

        return redirect()->route('pegawai.index')->with(['success'=> 'Data Berhasil Diupdate']);
        
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai.index')->with(['success'=> 'Data Berhasil Dihapus']);
    }

}
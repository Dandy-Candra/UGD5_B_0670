<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{

    public function index()
    {
    $pegawai = Pegawai::with('departemens')->paginate(5);
    //render view with posts
    return view('pegawai.index', compact('pegawai'));
    }
}
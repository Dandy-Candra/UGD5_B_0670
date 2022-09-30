<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;

class ProyekController extends Controller
{
    public function index()
    {
    $proyek = Proyek::with('departemens')->paginate(5);
    //render view with posts
    return view('proyek.index', compact('proyek'));
    }
}
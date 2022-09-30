<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Proyek extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_proyek',
        'id_departemen',
        'waktu_mulai',
        'waktu_selesai',
        'nilai_proyek',
        'status'
        ]; 

    public function departemens()
    {
        return $this->belongsTo(Departemen::class,'id_departemen');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon:: parse($this->atrributes['waktu_mulai'])->translatedFormat('l, d F Y');
    }
}
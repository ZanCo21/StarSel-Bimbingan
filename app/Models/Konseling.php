<?php

namespace App\Models;

use App\Models\Layanan;
use App\Models\Murid;
use App\Models\Gurubk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'layanan_id',
        'guru_id',
        'murid_id',
        'walas_id', 
        'tema',
        'keluhan',
        'tanggal_konseling',
        'tempat',
        'hasil_konseling',
    ];

    protected $table = 'konseling';


    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
    
    public function murids()
    {
        return $this->hasMany(Murid::class, 'user_id', 'murid_id', 'name');
    }
    public function gurus()
    {
        return $this->hasMany(Gurubk::class,'user_id');
    }
}

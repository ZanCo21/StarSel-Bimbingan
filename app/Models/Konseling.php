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
    protected $primaryKey = 'id';



    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
    
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id');
    }

    public function gurus()
    {
        return $this->hasMany(Gurubk::class,'user_id');
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'guru_id');
    }
}

<?php

namespace App\Models;

use App\Models\Layanan;
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
    
}
